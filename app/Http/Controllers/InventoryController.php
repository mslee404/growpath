<?php

namespace App\Http\Controllers;

use App\Models\UserGrowpath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    const HARVEST_GOLD = 500;

    public function index()
    {
        $items = Auth::user()->inventories()->with('item')->get()
            ->map(function ($inv) {
                $inv->item->is_equipped = $inv->is_equipped;
                return $inv->item;
            })
            ->groupBy('type');

        return view('inventory', [
            'my_avatars' => $items->get('avatar', collect()),
            'frame'      => $items->get('avatar_frame', collect()),
            'plant'      => $items->get('tanaman', collect()),
            'background' => $items->get('background', collect()),
        ]);
    }

    public function equip(Request $request)
    {
        $request->validate(['item_id' => 'required|integer']);

        $user = Auth::user();
        $inventory = $user->inventories()->with('item')->where('item_shop_id', $request->item_id)->first();

        if (!$inventory) {
            return response()->json(['message' => 'Kamu tidak memiliki item ini'], 403);
        }

        $type = $inventory->item->type;

        // Hanya satu item per tipe yang boleh terpasang
        DB::transaction(function () use ($user, $inventory, $type) {
            $user->inventories()
                ->whereHas('item', fn ($q) => $q->where('type', $type))
                ->update(['is_equipped' => false]);
            $inventory->update(['is_equipped' => true]);
        });

        return response()->json(['message' => 'Item berhasil dipasang!', 'type' => $type]);
    }

    public function harvest()
    {
        $user = Auth::user();

        // Kunci baris tanaman supaya panen ganda (klik dua kali) hanya dibayar sekali
        return DB::transaction(function () use ($user) {
            $plant = $user->inventories()
                ->where('is_equipped', true)
                ->whereHas('item', fn ($q) => $q->where('type', 'tanaman'))
                ->lockForUpdate()
                ->first();

            if (!$plant) {
                return response()->json(['message' => 'Tidak ada tanaman yang dipasang.'], 404);
            }

            if ($plant->level < UserGrowpath::MAX_PLANT_LEVEL) {
                return response()->json(['message' => 'Tanaman belum siap panen! Butuh stage 10.'], 400);
            }

            $plant->update(['level' => 1]);
            $user->increment('total_gold', self::HARVEST_GOLD);
            $user->unsetRelation('equipped');

            return response()->json([
                'message'       => 'Panen berhasil! Kamu mendapatkan ' . self::HARVEST_GOLD . ' Gold.',
                'new_gold'      => $user->total_gold,
                'new_plant_url' => $user->plant_url,
            ]);
        });
    }
}
