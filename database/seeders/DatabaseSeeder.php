<?php

namespace Database\Seeders;

use App\Models\UserGrowpath;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(PPSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(GoldShopSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(HabbitTaskSeeder::class);
        $this->call(UserInventorySeeder::class);
    }
}