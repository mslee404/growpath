<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PP;

class PPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pps = [
            ['code' => 'PP001', 'image' => 'images/1-pakde.svg'],
            ['code' => 'PP002', 'image' => 'images/2-senitsu.svg'],
            ['code' => 'PP003', 'image' => 'images/3-rahmat.svg'],
            ['code' => 'PP004', 'image' => 'images/4-mbokde.svg'],
            ['code' => 'PP005', 'image' => 'images/5-myistri.svg'],
            ['code' => 'PP006', 'image' => 'images/6-gweh.svg'],
            ['code' => 'PP007', 'image' => 'images/7-anya.svg'],
            ['code' => 'PP008', 'image' => 'images/8-wony.svg'],
        ];
        PP::insert($pps);
    }
}
