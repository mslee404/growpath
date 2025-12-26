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
        $userGrowpath =[ [
            "username"=> "admingrowpath",   
            "password"=> "123admin",
            "display_name"=> "admin growpath",
            "pp_id"=> "3",
            "total_xp"=> "150",
            "total_gold"=> "99999",
        ],[
            "username"=> "testuser",
            "password"=> "132test",
            "display_name"=> "test user",
            "pp_id"=> "1",
            "total_xp"=> "11",
            "total_gold"=> "20000",
        ],[
            "username"=> "shop",
            "password"=> "132test",
            "display_name"=> "shop",
            "pp_id"=> "1",
            "total_xp"=> "12",
            "total_gold"=> "100000",
        ],[
            "username"=> "leaderboard",
            "password"=> "132test",
            "display_name"=> "leaderboard",
            "pp_id"=> "1",
            "total_xp"=> "13",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard1",
            "password"=> "132test",
            "display_name"=> "leaderboard1",
            "pp_id"=> "1",
            "total_xp"=> "14",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard2",
            "password"=> "132test",
            "display_name"=> "leaderboard2",
            "pp_id"=> "1",
            "total_xp"=> "15",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard3",
            "password"=> "132test",
            "display_name"=> "leaderboard3",
            "pp_id"=> "1",
            "total_xp"=> "16",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard4",
            "password"=> "132test",
            "display_name"=> "leaderboard4",
            "pp_id"=> "1",
            "total_xp"=> "17",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard5",
            "password"=> "132test",
            "display_name"=> "leaderboard5",
            "pp_id"=> "1",
            "total_xp"=> "18",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard6",
            "password"=> "132test",
            "display_name"=> "leaderboard6",
            "pp_id"=> "1",
            "total_xp"=> "19",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard7",
            "password"=> "132test",
            "display_name"=> "leaderboard7",
            "pp_id"=> "1",
            "total_xp"=> "20",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard8",
            "password"=> "132test",
            "display_name"=> "leaderboard8",
            "pp_id"=> "1",
            "total_xp"=> "21",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard9",
            "password"=> "132test",
            "display_name"=> "leaderboard9",
            "pp_id"=> "1",
            "total_xp"=> "22",
            "total_gold"=> "100",
        ],[
            "username"=> "leaderboard10",
            "password"=> "132test",
            "display_name"=> "leaderboard10",
            "total_xp"=> "23",
            "total_gold"=> "100",
        ]      
    ];
        
        foreach ($userGrowpath as $user) {
            UserGrowpath::create($user);
        }
    }
}
