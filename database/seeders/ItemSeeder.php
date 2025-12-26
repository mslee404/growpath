<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemShop;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $avatars = [
        [
            'name' => 'Kakek Petani',
            'type' => 'avatar', 
            'desc' => 'Merawat tanaman seperti cucu sendiri',
            'image' => 'images/1-pakde.svg',
            'price' => '0' 
            ],
        [
            'name' => 'Bude',
            'type' => 'avatar', 
            'desc' => 'Merawat tanaman seperti cucu sendiri',
            'image' => 'images/4-mbokde.svg',
            'price' => '0' 
            ],
        [
            'name' => 'Dewa Petir',
            'type' => 'avatar', 
            'desc' => 'Avatar spesial Dewa Petir (Zenitsu)',
            'image' => 'images/2-senitsu.svg',
            'price' => '7500' 
            ],
        [
            'name' => 'My Istri',
            'type' => 'avatar',
            'desc' => 'Bukankah ini (Waguri-chan)',
            'image' => 'images/5-myistri.svg',
            'price' => '7500' ],
        [
            'name' => 'Rahmat',
            'type' => 'avatar',
            'desc' => 'Rahmat si jagoan neon',
            'image' => 'images/3-rahmat.svg',
            'price' => '7500' ],
        [
            'name' => 'Gwejh',
            'type' => 'avatar',
            'desc' => 'Detektif',
            'image' => 'images/6-gweh.svg',
            'price' => '7500' ], 
        [
            'name' => 'Anya',
            'type' => 'avatar',
            'desc' => 'Spy mission waku waku',
            'image' => 'images/7-anya.svg',
            'price' => '7500' ],
        [
            'name' => 'Super Idol',
            'type' => 'avatar',
            'desc' => 'Won Forever Young',
            'image' => 'images/8-wony.svg',
            'price' => '7500' ]
    ];
    
    $frames = [
        [
            'name' => 'Apple Frame',
            'type' => 'avatar_frame', // Corrected from Frame to avatar_frame
            'desc' => 'Frame apel apel emas',
            'image' => 'images/Apple.svg',
            'price' => '7500' 
        ],
        [
            'name' => 'Sea Frame',
            'type' => 'avatar_frame',
            'desc' => 'Frame laut ubur ubur kerang cute kawaii',
            'image' => 'images/Laut.svg',
            'price' => '7500' 
        ],
        [
            'name' => 'Night Sky Frame',
            'type' => 'avatar_frame',
            'desc' => 'Terdengar burung hantu suaranya merdu',
            'image' => 'images/Malam.svg',
            'price' => '7500' 
        ],
    ];

    $plants = [
        [
            'name' => 'Buah Naga',
            'type' => 'tanaman', // Corrected from Plant to tanaman
            'desc' => 'Buah naga merah yang segar dan manis (kayanya)',
            'image' => 'images/Dragon fruit.svg',
            'price' => '10000' 
        ],
        [
            'name' => 'Buah Jeruk',
            'type' => 'tanaman',
            'desc' => 'Jeruk makan jeruk',
            'image' => 'images/Plant-Orange.svg',
            'price' => '10000' 
        ],
        [
            'name' => 'Buah Pepaya',
            'type' => 'tanaman',
            'desc' => 'Pepaya California yang dirawat seperti anak sendiri',
            'image' => 'images/Plant-Papaya.svg',
            'price' => '10000' 
        ],
        [
            'name' => 'Terong',
            'type' => 'tanaman',
            'desc' => 'Ayam penyet dan terong goreng',
            'image' => 'images/Plant-Eggplant.svg',
            'price' => '10000' 
        ]
    ];

    // Merge all arrays
    $items = array_merge($avatars, $frames, $plants);

    foreach ($items as $item) {
        ItemShop::create($item);
    }
    }
}
