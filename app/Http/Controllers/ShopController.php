<?php

namespace App\Http\Controllers;

use App\Models\GoldShop;
use App\Models\ItemShop;
use App\Models\UserGrowpath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Item yang BELUM dimiliki user, dikelompokkan per tipe
        $items = ItemShop::whereNotIn('id', $user->inventories()->select('item_shop_id'))
            ->orderBy('price')
            ->orderBy('id')
            ->get()
            ->groupBy('type');

        // Format paket gold agar kompatibel dengan komponen item-box
        $gold = GoldShop::orderBy('price')->get()->map(fn ($package) => [
            'id'     => $package->id,
            'name'   => $package->name,
            'desc'   => "+{$package->amount} Gold, +{$package->xp} XP",
            'image'  => '/images/Gold.svg',
            'price'  => $package->price,
            'type'   => 'gold',
            'amount' => $package->amount,
            'xp'     => $package->xp,
        ]);

        return view('shop', [
            'avatar'     => $items->get('avatar', collect()),
            'frame'      => $items->get('avatar_frame', collect()),
            'plant'      => $items->get('tanaman', collect()),
            'background' => $items->get('background', collect()),
            'gold'       => $gold,
            'userGold'   => $user->total_gold,
            'snapJs'     => GoldTopupController::snapJsUrl(),
            'snapClient' => config('services.midtrans.client_key'),
        ]);
    }

    public function buy(Request $request)
    {
        $request->validate(['item_id' => 'required|exists:item_shops,id']);
        $item = ItemShop::findOrFail($request->item_id);

        // Kunci baris user supaya dua pembelian bersamaan tidak memakai gold yang sama
        return DB::transaction(function () use ($item) {
            $user = UserGrowpath::lockForUpdate()->findOrFail(Auth::id());

            if ($user->inventories()->where('item_shop_id', $item->id)->exists()) {
                return response()->json(['message' => 'Kamu sudah memiliki item ini!'], 400);
            }

            if ($user->total_gold < $item->price) {
                return response()->json(['message' => 'Gold tidak cukup!'], 400);
            }

            $user->decrement('total_gold', $item->price);
            $user->inventories()->create(['item_shop_id' => $item->id, 'is_equipped' => false]);

            return response()->json([
                'message'   => 'Item berhasil dibeli!',
                'new_gold'  => $user->total_gold,
                'item_name' => $item->name,
            ]);
        });
    }
}
