<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Katalog: aman dijalankan berulang, juga di production
        $this->call([PPSeeder::class, ItemSeeder::class, GoldShopSeeder::class]);

        // Akun & data demo (password lemah) hanya untuk lokal
        if (!app()->isProduction()) {
            $this->call([UserSeeder::class, HabbitTaskSeeder::class, UserInventorySeeder::class]);
        }
    }
}
