<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ItemShop;
use App\Models\UserInventory;
use App\Models\UserGrowpath;
use App\Models\GoldShop;
use App\Models\GoldPurchase;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil ID item yang sudah dimiliki user
        $ownedItemIds = UserInventory::where('user_id', $user->id)->pluck('item_shop_id');

        // Ambil item yang BELUM dimiliki user
        $items = ItemShop::whereNotIn('id', $ownedItemIds)->get();

        // Grouping item berdasarkan tipe
        $avatar = $items->where('type', 'avatar')->values();
        $frame = $items->where('type', 'avatar_frame')->values();
        $plant = $items->where('type', 'tanaman')->values();
        $background = $items->where('type', 'background')->values();
        
        // Gold packages dari GoldShop table
        // Format data agar kompatibel dengan item-box component
        $gold = GoldShop::all()->map(function ($package) {
            return [
                'id'    => $package->id,
                'name'  => $package->name,
                'desc'  => "+{$package->amount} Gold, +{$package->xp} XP",
                'image' => '/images/Gold.svg',
                'price' => $package->price,
                'type'  => 'gold',
                'amount' => $package->amount,
                'xp'    => $package->xp,
            ];
        });

        $userGold = $user->total_gold;

        return view('shop', compact('avatar', 'frame', 'plant', 'background', 'gold', 'userGold'));
    }

    public function buy(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:item_shops,id',
        ]);

        /** @var \App\Models\UserGrowpath $user */
        $user = Auth::user();
        $item = ItemShop::find($request->item_id);

        // 1. Cek apakah user sudah punya item ini?
        $alreadyOwns = UserInventory::where('user_id', $user->id)
            ->where('item_shop_id', $item->id)
            ->exists();

        if ($alreadyOwns) {
            return response()->json(['message' => 'Kamu sudah memiliki item ini!'], 400);
        }

        // 2. Cek apakah gold cukup?
        if ($user->total_gold < $item->price) {
            return response()->json(['message' => 'Gold tidak cukup!'], 400);
        }

        // 3. Proses Transaksi
        // Kurangi Gold
        $user->total_gold -= $item->price;
        $user->save();

        // Tambah ke Inventory
        UserInventory::create([
            'user_id' => $user->id,
            'item_shop_id' => $item->id,
            'is_equipped' => false,
        ]);

        return response()->json([
            'message' => 'Item berhasil dibeli!',
            'new_gold' => $user->total_gold,
            'item_name' => $item->name
        ]);
    }

    /**
     * Buy gold package (top-up style)
     */
    public function buyGold(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:gold_shops,id',
        ]);

        /** @var \App\Models\UserGrowpath $user */
        $user = Auth::user();
        $package = GoldShop::find($request->package_id);

        // Untuk demo: langsung berhasil tanpa payment gateway
        // Di production, ini akan melalui payment gateway

        // 1. Tambah Gold ke user
        $user->total_gold += $package->amount;
        
        // 2. Tambah XP ke user
        $user->addXp($package->xp);

        // 3. Record purchase
        GoldPurchase::create([
            'user_id'    => $user->id,
            'package_id' => $package->id,
            'status'     => 'success',
            'date'       => now(),
        ]);

        return response()->json([
            'message'  => "Berhasil! +{$package->amount} Gold, +{$package->xp} XP",
            'new_gold' => $user->total_gold,
            'new_xp'   => $user->current_xp,
            'new_level' => $user->level,
        ]);
    }
}

