<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {
        $user = Auth::user()->load('pp'); // eager load relation pp biar tidak N+1

        // TODO: Nanti ganti dengan data real dari database
        // Contoh sementara pakai dummy seperti di view-mu sebelumnya
        $habits_semua = [
            ['title' => 'contoh harian', 'xp' => 3, 'category' => 'harian', 'checked' => false],
            ['title' => 'contoh mingguan', 'xp' => 10, 'category' => 'mingguan', 'checked' => false],
            ['title' => 'contoh bulanan', 'xp' => 20, 'category' => 'bulanan', 'checked' => true],
        ];

        $habits_harian = [['title' => 'contoh harian', 'xp' => 3, 'category' => 'harian', 'checked' => false]];
        $habits_mingguan = [['title' => 'contoh mingguan', 'xp' => 10, 'category' => 'mingguan', 'checked' => false]];
        $habits_bulanan = [['title' => 'contoh bulanan', 'xp' => 20, 'category' => 'bulanan', 'checked' => true]];
        $habits_kustom = [];

        $tugas_semua = [
            ['title' => 'Tugas DABD', 'xp' => 15, 'category' => 'Kuliah', 'date' => '20/10/2025', 'time' => '23:59', 'checked' => false],
            ['title' => 'Tugas TCBA', 'xp' => 25, 'category' => 'Kuliah', 'date' => '20/10/2025', 'time' => '23:59', 'checked' => false],
        ];
        $tugas_hari_ini = [];
        $tugas_besok = [];

        return view('home', compact(
            'user',
            'habits_semua',
            'habits_harian',
            'habits_mingguan',
            'habits_bulanan',
            'habits_kustom',
            'tugas_semua',
            'tugas_hari_ini',
            'tugas_besok'
        ));
    }
}
