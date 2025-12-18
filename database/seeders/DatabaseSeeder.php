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
    }
}