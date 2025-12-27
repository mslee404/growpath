<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGrowpath;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Ambil top 8 user berdasarkan total_xp tertinggi
        $users = UserGrowpath::orderByDesc('total_xp')
            ->take(8)
            ->get();

        $currentUser = Auth::user();

        // Jika user tidak ada di Top 8
        if (!$users->contains('id', $currentUser->id)) {
            // Hapus element terakhir (Rank 8)
            $users->pop();
            // Masukkan current user menggantikan posisi ke-8 (meski rank aslinya mungkin jauh)
            $users->push($currentUser);
        }

        return view('leaderboard', compact('users'));
    }
}
