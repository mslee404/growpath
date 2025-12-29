<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GoldShop;

class GoldShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $goldPackages = [
            [
                'name'   => 'Kantong Kecil',
                'amount' => 100,
                'price'  => 5000,  // Harga dalam mata uang virtual/nyata (bisa disesuaikan logic payment)
                'xp'     => 10,
            ],
            [
                'name'   => 'Kantong Sedang',
                'amount' => 300,
                'price'  => 12000,
                'xp'     => 35,
            ],
            [
                'name'   => 'Kantong Besar',
                'amount' => 500,
                'price'  => 18000,
                'xp'     => 60,
            ],
            [
                'name'   => 'Karung Emas',
                'amount' => 1000,
                'price'  => 30000,
                'xp'     => 150,
            ],
            [
                'name'   => 'Peti Harta Karun',
                'amount' => 2500,
                'price'  => 60000,
                'xp'     => 400,
            ],
        ];

        foreach ($goldPackages as $package) {
            GoldShop::create($package);
        }

        $this->command->info('Gold shop packages seeded successfully!');
    }
}
