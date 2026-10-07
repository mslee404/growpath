<?php

namespace App\Http\Controllers;

use App\Models\GoldPurchase;
use App\Models\GoldShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Top-up gold lewat Midtrans Snap.
 * Alur: create (token Snap) -> user bayar di popup -> check (tanya status ke Midtrans) / notify (webhook).
 * Gold + XP hanya dikreditkan sekali per order, di apply().
 */
class GoldTopupController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(['package_id' => 'required|exists:gold_shops,id']);

        if (!config('services.midtrans.server_key')) {
            return response()->json(['message' => 'Top-up belum aktif (kunci Midtrans belum diatur).'], 503);
        }

        $user = Auth::user();
        $package = GoldShop::findOrFail($request->package_id);

        $purchase = GoldPurchase::create([
            'user_id'    => $user->id,
            'package_id' => $package->id,
            'order_id'   => 'GP-' . $user->id . '-' . Str::upper(Str::random(10)),
            'status'     => 'pending',
            'date'       => now(),
        ]);

        $res = $this->midtrans()->post(self::baseUrl('app') . '/snap/v1/transactions', [
            'transaction_details' => ['order_id' => $purchase->order_id, 'gross_amount' => $package->price],
            'item_details'        => [[
                'id'       => 'GOLD-' . $package->id,
                'price'    => $package->price,
                'quantity' => 1,
                'name'     => Str::limit($package->name, 50, ''),
            ]],
            'customer_details'    => ['first_name' => Str::limit($user->name, 50, '')],
        ]);

        if ($res->failed()) {
            $purchase->update(['status' => 'failed']);
            Log::warning('Midtrans Snap gagal', ['order' => $purchase->order_id, 'body' => $res->body()]);

            return response()->json(['message' => 'Gagal menghubungi Midtrans. Coba lagi nanti.'], 502);
        }

        return response()->json(['snap_token' => $res->json('token'), 'order_id' => $purchase->order_id]);
    }

    public function check(string $orderId)
    {
        $purchase = GoldPurchase::where('order_id', $orderId)->where('user_id', Auth::id())->firstOrFail();

        if ($purchase->status === 'pending') {
            $res = $this->midtrans()->get(self::baseUrl('api') . "/v2/{$orderId}/status");
            if ($res->successful()) {
                $this->apply($purchase, $res->json());
            }
            $purchase->refresh();
        }

        return response()->json([
            'status'   => $purchase->status,
            'message'  => match ($purchase->status) {
                'success' => "Berhasil! +{$purchase->package->amount} Gold, +{$purchase->package->xp} XP",
                'pending' => 'Pembayaran belum selesai. Gold masuk otomatis setelah lunas.',
                default   => 'Pembayaran gagal atau dibatalkan.',
            },
            'new_gold' => Auth::user()->fresh()->total_gold,
        ]);
    }

    // Webhook dari Midtrans (tanpa login & tanpa CSRF), diverifikasi lewat signature_key
    public function notify(Request $request)
    {
        $serverKey = config('services.midtrans.server_key');
        $expected = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if (!$serverKey || !hash_equals($expected, (string) $request->signature_key)) {
            return response()->json(['message' => 'Signature tidak valid'], 403);
        }

        if ($purchase = GoldPurchase::where('order_id', $request->order_id)->first()) {
            $this->apply($purchase, $request->all());
        }

        return response()->json(['ok' => true]);
    }

    public static function snapJsUrl(): ?string
    {
        return config('services.midtrans.client_key') ? self::baseUrl('app') . '/snap/snap.js' : null;
    }

    private static function baseUrl(string $sub): string
    {
        return config('services.midtrans.production')
            ? "https://{$sub}.midtrans.com"
            : "https://{$sub}.sandbox.midtrans.com";
    }

    private function midtrans()
    {
        return Http::withBasicAuth((string) config('services.midtrans.server_key'), '')->acceptJson()->timeout(15);
    }

    private function apply(GoldPurchase $purchase, array $trx): void
    {
        $status = $trx['transaction_status'] ?? null;
        $paid = $status === 'settlement'
            || ($status === 'capture' && ($trx['fraud_status'] ?? 'accept') === 'accept');
        $failed = in_array($status, ['deny', 'cancel', 'expire', 'failure'], true);

        if (!$paid && !$failed) {
            return;
        }

        DB::transaction(function () use ($purchase, $paid) {
            $locked = GoldPurchase::with(['user', 'package'])->lockForUpdate()->find($purchase->id);
            if ($locked->status !== 'pending') {
                return; // sudah diproses sebelumnya
            }

            $locked->update(['status' => $paid ? 'success' : 'failed']);

            if ($paid) {
                $locked->user->increment('total_gold', $locked->package->amount);
                $locked->user->addXp($locked->package->xp);
            }
        });
    }
}
