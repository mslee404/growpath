<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil user yang login + eager load relation pp untuk avatar
        $user = Auth::user()->load('pp');

        // === AMBIL HABITS ===
        // Eager load semua kemungkinan relasi habit
        $userHabits = $user->habits()->with(['customHabit', 'dailyHabit', 'weeklyHabit', 'monthlyHabit'])->get();

        // Hitung persentase XP (asumsi 100 XP per level)
        $xp_percentage = ($user->exp ?? 0) % 100;

        // Filter Habit yang sudah selesai periode ini
        $filteredHabits = $userHabits->filter(function ($habit) {
            $today = Carbon::today();
            
            // Cek record penyelesaian
            // Asumsi relation 'records' belum ada di model userHabit, kita pakai query manual dulu untuk safety
            // Atau load relation jika sudah ditambahkan
            
            // Check Daily: Done today?
            if ($habit->habit_type == 'daily') {
                return !\App\Models\HabitRecord::where('user_habit_id', $habit->id)
                    ->whereDate('completion_date', $today)
                    ->exists();
            }

            // Check Weekly: Done this week (Mon-Sun)?
            if ($habit->habit_type == 'weekly') {
                return !\App\Models\HabitRecord::where('user_habit_id', $habit->id)
                    ->whereBetween('completion_date', [
                        $today->copy()->startOfWeek(), 
                        $today->copy()->endOfWeek()
                    ])
                    ->exists();
            }

            // Check Monthly: Done this month?
            if ($habit->habit_type == 'monthly') {
                return !\App\Models\HabitRecord::where('user_habit_id', $habit->id)
                    ->whereYear('completion_date', $today->year)
                    ->whereMonth('completion_date', $today->month)
                    ->exists();
            }

            // Custom: Logic bisa lebih kompleks, sementara anggap daily reset
             if ($habit->habit_type == 'custom') {
                 // Simplifikasi: cek hari ini saja dulu
                 return !\App\Models\HabitRecord::where('user_habit_id', $habit->id)
                    ->whereDate('completion_date', $today)
                    ->exists();
            }

            return true;
        });

        $habits_semua = $filteredHabits->map(function ($userHabit) {
            // Manual resolution of 'detail' based on habit_type
            $detail = match ($userHabit->habit_type) {
                'custom' => $userHabit->customHabit,
                'daily'  => $userHabit->dailyHabit,
                'weekly' => $userHabit->weeklyHabit,
                'monthly' => $userHabit->monthlyHabit,
                default  => null,
            };

            if (!$detail) {
                return null;
            }

            // Mapping kategori ke bahasa Indonesia seperti di view
            $categoryMap = [
                'daily'   => 'harian',
                'weekly'  => 'mingguan',
                'monthly' => 'bulanan',
                'custom'  => 'kustom',
            ];

            $category = $categoryMap[$userHabit->habit_type] ?? 'lainnya';

            // Tentukan XP (bisa disesuaikan lebih dinamis nanti)
            $xpMap = [
                'daily'   => 3,
                'weekly'  => 10,
                'monthly' => 20,
                'custom'  => 15,
            ];
            $xp = $xpMap[$userHabit->habit_type] ?? 5;

            // Checked: sementara false semua (nanti bisa dari progress harian)
            $checked = false;

            return [
                'id'       => $userHabit->id,
                'raw_detail' => $detail,
                'habit_type' => $userHabit->habit_type,
                'title'    => $detail->habit_name,
                'xp'       => $xp,
                'category' => $category,
                'checked'  => $checked,
            ];
        })->filter()->values(); // hilangkan null dan re-index

        // Filter per tab
        $habits_harian   = $habits_semua->where('category', 'harian');
        $habits_mingguan = $habits_semua->where('category', 'mingguan');
        $habits_bulanan  = $habits_semua->where('category', 'bulanan');
        $habits_kustom   = $habits_semua->where('category', 'kustom');

        // === AMBIL TUGAS === (Hanya yang belum selesai)
        $tasks = $user->tasks()
            ->where('is_completed', false)
            ->orderBy('due_date')
            ->orderBy('due_time')
            ->get();

        $tugas_semua = $tasks->map(function ($task) {
            return [
                'id'        => $task->id,
                'raw_detail'=> $task,
                'title'     => $task->task_name,
                'xp'        => 20, // bisa dibuat dinamis nanti
                'category'  => 'Kuliah', // atau tambah kolom category di task
                'date'      => $task->due_date->format('d/m/Y'),
                'time'      => $task->due_time->format('H:i'),
                'checked'   => $task->is_completed,
            ];
        })->values();

        // Filter hari ini & besok
        $today     = Carbon::today();
        $tomorrow  = Carbon::tomorrow();

        $tugas_hari_ini = $tugas_semua->filter(function ($t) use ($today) {
            return Carbon::createFromFormat('d/m/Y', $t['date'])->isSameDay($today);
        });

        $tugas_besok = $tugas_semua->filter(function ($t) use ($tomorrow) {
            return Carbon::createFromFormat('d/m/Y', $t['date'])->isSameDay($tomorrow);
        });

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
