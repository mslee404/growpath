<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserGrowpath;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userGrowpath = [
            "username"=> "admingrowpath",
            "password"=> "123admin",
            "display_name"=> "admin growpath",
            "pp_id"=> "3",
            "total_xp"=> "150",
            "level"=> "2",
            "total_gold"=> "99999",
        ];
        UserGrowpath::create($userGrowpath);
    }
}
