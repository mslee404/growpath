<?php

namespace App\Http\Controllers;

use App\Models\UserGrowpath;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = UserGrowpath::with(['equipped', 'pp'])
            ->orderByDesc('total_xp')
            ->orderBy('id')
            ->take(8)
            ->get()
            ->each(fn ($u, $i) => $u->rank = $i + 1);

        // User yang login selalu tampil di baris terakhir, dengan peringkat aslinya
        $me = Auth::user();
        if (!$users->contains('id', $me->id)) {
            $me->load(['equipped', 'pp']);
            $me->rank = UserGrowpath::where('total_xp', '>', $me->total_xp)->count() + 1;
            $users->pop();
            $users->push($me);
        }

        return view('leaderboard', compact('users'));
    }
}
