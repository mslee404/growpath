<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index()
    {
        /** @var \App\Models\UserGrowpath $user */
        $user = Auth::user();

        // Ambil inventory user beserta detail itemnya
        $inventories = $user->inventories()->with('item')->get();

        // Group by item type
        // Perhatikan type di database: 'avatar', 'avatar_frame', 'tanaman', 'background'
        
        $my_avatars = $inventories->filter(fn($inv) => $inv->item->type === 'avatar')->map(function($inv) {
            $inv->item->is_equipped = $inv->is_equipped;
            return $inv->item;
        });

        $frame = $inventories->filter(fn($inv) => $inv->item->type === 'avatar_frame')->map(function($inv) {
            $inv->item->is_equipped = $inv->is_equipped;
            return $inv->item;
        });

        $plant = $inventories->filter(fn($inv) => $inv->item->type === 'tanaman')->map(function($inv) {
            $inv->item->is_equipped = $inv->is_equipped;
            return $inv->item;
        });

        $background = $inventories->filter(fn($inv) => $inv->item->type === 'background')->map(function($inv) {
            $inv->item->is_equipped = $inv->is_equipped;
            return $inv->item;
        });

        return view('inventory', compact('my_avatars', 'frame', 'plant', 'background'));
    }

    public function equip(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:item_shops,id',
        ]);

        $user = Auth::user();
        $itemToCheck = \App\Models\ItemShop::find($request->item_id);

        if (!$itemToCheck) {
            return response()->json(['message' => 'Item tidak ditemukan'], 404);
        }

        // Pastikan user memilikinya dalam inventory
        $userInventory = $user->inventories()
            ->where('item_shop_id', $request->item_id)
            ->first();

        if (!$userInventory) {
            return response()->json(['message' => 'Kamu tidak memiliki item ini'], 403);
        }

        // Unequip semua item dengan tipe sama milik user ini
        // Kita cari ID item lain yang tipenya sama
        $type = $itemToCheck->type;

        // Ambil semua inventory user, filter berdasarkan item.type via relationship
        // Cara efisien: whereHas item.
        $user->inventories()
            ->whereHas('item', function($q) use ($type) {
                $q->where('type', $type);
            })
            ->update(['is_equipped' => false]);

        // Equip item yang dipilih
        $userInventory->is_equipped = true;
        $userInventory->save();

        return response()->json(['message' => 'Item berhasil dipasang!', 'type' => $type]);
    }
}
