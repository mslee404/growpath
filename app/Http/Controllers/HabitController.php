<?php

namespace App\Http\Controllers;

use App\Models\UserHabit;
use App\Models\DailyHabit;
use App\Models\WeeklyHabit;
use App\Models\MonthlyHabit;
use App\Models\CustomHabit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabitController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_habit' => 'required|string|max:255',
            'frekuensi'  => 'required|in:daily,weekly,monthly,custom',
        ]);

        $user = Auth::user();

        // 1. Buat Parent Record (UserHabit)
        $userHabit = UserHabit::create([
            'user_id'    => $user->id,
            'habit_type' => $request->frekuensi,
        ]);

        // 2. Buat Child Record sesuai tipe
        switch ($request->frekuensi) {
            case 'daily':
                // Validasi input khusus daily
                $request->validate([
                    'jam_daily' => 'required',
                ]);

                DailyHabit::create([
                    'user_habit_id'     => $userHabit->id,
                    'habit_name'        => $request->nama_habit,
                    'habit_description' => $request->detail_habit,
                    'hour'              => $request->jam_daily,
                ]);
                break;

            case 'weekly':
                $request->validate([
                    'jam_weekly'  => 'required',
                    'hari_weekly' => 'required',
                ]);

                WeeklyHabit::create([
                    'user_habit_id'     => $userHabit->id,
                    'habit_name'        => $request->nama_habit,
                    'habit_description' => $request->detail_habit,
                    'hour'              => $request->jam_weekly,
                    'day'               => strtolower($request->hari_weekly),

                ]);
                break;

            case 'monthly':
                $request->validate([
                    'monthly_mode' => 'required|in:tanggal,minggu',
                ]);

                if ($request->monthly_mode == 'tanggal') {
                    $request->validate(['tanggal_monthly' => 'required', 'jam_monthly_tanggal' => 'required']);
                    
                    MonthlyHabit::create([
                        'user_habit_id'     => $userHabit->id,
                        'habit_name'        => $request->nama_habit,
                        'habit_description' => $request->detail_habit,
                        'hour'              => $request->jam_monthly_tanggal,
                        'schedule_type'     => 'date',
                        'date'              => $request->tanggal_monthly,
                    ]);

                } else {
                    $request->validate(['hari_monthly' => 'required', 'minggu_ke' => 'required', 'jam_monthly_minggu' => 'required']);

                    MonthlyHabit::create([
                        'user_habit_id'     => $userHabit->id,
                        'habit_name'        => $request->nama_habit,
                        'habit_description' => $request->detail_habit,
                        'hour'              => $request->jam_monthly_minggu,
                        'schedule_type'     => 'week', 
                        'day'               => strtolower($request->hari_monthly),
                        'week'              => $request->minggu_ke,
                    ]);
                }
                break;

            case 'custom':
                $request->validate([
                    'interval_custom' => 'required|integer|min:1',
                    'jam_custom'      => 'required',
                ]);

                CustomHabit::create([
                    'user_habit_id'     => $userHabit->id,
                    'habit_name'        => $request->nama_habit,
                    'habit_description' => $request->detail_habit,
                    'hour'              => $request->jam_custom,
                    'day_count'         => $request->interval_custom,
                ]);
                break;
        }

        return redirect()->back()->with('success', 'Habit berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $habit = UserHabit::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $habit->delete();

        return redirect()->back()->with('success', 'Habit berhasil dihapus!');
    }

    public function check($id)
    {
        $habit = UserHabit::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Cek apakah sudah dicek hari ini (atau periode ini)
        // Sederhananya cek apakah ada record hari ini
        $today = now()->format('Y-m-d');
        
        // Menggunakan relasi 'records' yang sudah ditambahkan di UserHabit
        $exists = $habit->records()
                    ->whereDate('completion_date', $today)
                    ->exists();

        if (!$exists) {
            // Tentukan XP berdasarkan habit_type
            $xpEarned = match($habit->habit_type) {
                'daily' => 3,
                'weekly' => 10,
                'monthly' => 20,
                'custom' => 5,
                default => 10,
            };

            $habit->records()->create([
                'completion_date' => $today,
                'xp_earned' => $xpEarned,
            ]);

            Auth::user()->addXp($xpEarned);
        }

        return redirect()->back()->with('success', 'Habit terlaksana! +10 XP');
    }

    public function update(Request $request, $id)
    {
        /** @var \App\Models\UserGrowpath $user */
        $user = Auth::user();
        $habit = UserHabit::where('id', $id)->where('user_id', $user->id)->firstOrFail();
        
        $detail = $habit->detail();

        if ($detail) {
            $data = [
                'habit_name' => $request->nama_habit ?? $detail->habit_name,
                'habit_description' => $request->detail_habit ?? $detail->habit_description,
            ];

            // Update specific fields based on habit_type
            if ($habit->habit_type === 'daily') {
                if ($request->jam_daily) $data['hour'] = $request->jam_daily;
            }
            elseif ($habit->habit_type === 'weekly') {
                if ($request->jam_weekly) $data['hour'] = $request->jam_weekly;
                
                $validDays = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
                if ($request->hari_weekly && in_array(strtolower($request->hari_weekly), $validDays)) {
                    $data['day'] = strtolower($request->hari_weekly);
                }
            }
            elseif ($habit->habit_type === 'monthly') {
                if ($request->monthly_mode === 'tanggal') {
                    $data['schedule_type'] = 'date';
                    $data['date'] = $request->tanggal_monthly;
                    $data['hour'] = $request->jam_monthly_tanggal;
                    $data['day'] = null;
                    $data['week'] = null;
                } elseif ($request->monthly_mode === 'minggu') {
                    $data['schedule_type'] = 'week';
                    $data['day'] = strtolower($request->hari_monthly);
                    $data['week'] = $request->minggu_ke;
                    $data['hour'] = $request->jam_monthly_minggu;
                    $data['date'] = null;
                }
            }
            elseif ($habit->habit_type === 'custom') {
                if ($request->interval_custom) $data['day_count'] = $request->interval_custom;
                if ($request->jam_custom) $data['hour'] = $request->jam_custom;
            }

            $detail->update($data);
        }

        return redirect()->back()->with('success', 'Habit diperbarui!');
    }
}
