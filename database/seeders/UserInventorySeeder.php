<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserGrowpath;
use App\Models\ItemShop;
use App\Models\UserInventory;

class UserInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ambil user admin
        $admin = UserGrowpath::where('username', 'admingrowpath')->first();

        if (!$admin) {
            $this->command->error("User 'admingrowpath' tidak ditemukan. Pastikan UserSeeder sudah dijalankan.");
            return;
        }

        // 2. Ambil semua item dari shop
        $items = ItemShop::all();

        if ($items->isEmpty()) {
            $this->command->error("ItemShop kosong. Pastikan ItemSeeder sudah dijalankan.");
            return;
        }

        // 3. Masukkan ke inventory admin jika belum ada
        foreach ($items as $item) {
            UserInventory::firstOrCreate(
                [
                    'user_id' => $admin->id,
                    'item_shop_id' => $item->id,
                ],
                [
                    'is_equipped' => false, // Default tidak dipakai
                ]
            );
        }

        $this->command->info("Berhasil menambahkan " . $items->count() . " item ke inventory user: " . $admin->username);
    }
}
