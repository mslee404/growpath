<?php

namespace App\Http\Controllers;

use App\Models\TaskUser;
use App\Models\UserHabit;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user()->load(['pp', 'equipped']);

        // Satu query untuk semua habit + tanggal centang terakhir (bukan satu query per habit)
        $habits = $user->habits()
            ->with(['dailyHabit', 'weeklyHabit', 'monthlyHabit', 'customHabit'])
            ->withMax('records', 'completion_date')
            ->get()
            ->reject(fn (UserHabit $h) => $h->isDoneThisPeriod($h->records_max_completion_date))
            ->map(function (UserHabit $h) {
                $detail = $h->detail();

                return $detail ? [
                    'id'         => $h->id,
                    'raw_detail' => $detail,
                    'habit_type' => $h->habit_type,
                    'title'      => $detail->habit_name,
                    'xp'         => $h->xp(),
                    'category'   => UserHabit::CATEGORY[$h->habit_type],
                ] : null;
            })
            ->filter()
            ->values();

        $tasks = $user->tasks()
            ->where('is_completed', false)
            ->orderBy('due_date')
            ->orderBy('due_time')
            ->get()
            ->map(fn (TaskUser $t) => [
                'id'         => $t->id,
                'raw_detail' => $t,
                'title'      => $t->task_name,
                'xp'         => TaskUser::XP,
                'date'       => $t->due_date?->format('d/m/Y'),
                'time'       => $t->due_time?->format('H:i'),
                'due'        => $t->due_date,
            ]);

        // [id panel => [label tab, item, pesan kosong]]
        $habitPanels = [
            'habit-semua'    => ['Semua', $habits, 'Belum ada habit.'],
            'habit-harian'   => ['Harian', $habits->where('category', 'harian'), 'Belum ada habit harian.'],
            'habit-mingguan' => ['Mingguan', $habits->where('category', 'mingguan'), 'Belum ada habit mingguan.'],
            'habit-bulanan'  => ['Bulanan', $habits->where('category', 'bulanan'), 'Belum ada habit bulanan.'],
            'habit-kustom'   => ['Kustom', $habits->where('category', 'kustom'), 'Belum ada habit kustom.'],
        ];

        $taskPanels = [
            'tugas-semua'    => ['Semua', $tasks, 'Belum ada tugas.'],
            'tugas-hari-ini' => ['Hari Ini', $tasks->filter(fn ($t) => $t['due']?->isToday()), 'Tidak ada tugas hari ini.'],
            'tugas-besok'    => ['Besok', $tasks->filter(fn ($t) => $t['due']?->isTomorrow()), 'Tidak ada tugas untuk besok.'],
        ];

        return view('home', compact('user', 'habitPanels', 'taskPanels'));
    }
}
