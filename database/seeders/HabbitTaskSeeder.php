<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserGrowpath;
use App\Models\TaskUser;
use App\Models\UserHabit;
use App\Models\DailyHabit;
use App\Models\WeeklyHabit;
use App\Models\MonthlyHabit;
use App\Models\CustomHabit;

class HabbitTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user admin (atau user pertama)
        $user = UserGrowpath::where('username', 'admingrowpath')->first()
                ?? UserGrowpath::first();

        if (!$user) {
            $this->command->info('User tidak ditemukan. Jalankan UserSeeder dulu!');
            return;
        }

        // === HABIT HARIAN ===
        $daily = UserHabit::create([
            'user_id'     => $user->id,
            'habit_type'  => 'daily',
        ]);

        DailyHabit::create([
            'user_habit_id'     => $daily->id,
            'habit_name'        => 'Habbit Harian',
            'habit_description' => 'Biasane yo piye',
            'hour'              => '20:00', 
        ]);

        // === HABIT MINGGUAN ===
        $weekly = UserHabit::create([
            'user_id'     => $user->id,
            'habit_type'  => 'weekly',
        ]);

        WeeklyHabit::create([
            'user_habit_id'     => $weekly->id,
            'habit_name'        => 'Seminggu pisan',
            'habit_description' => 'madang gedhen',
            'hour'              => '07:00',
            'day'               => 'sabtu', 
        ]);

        // === HABIT BULANAN ===
        $monthly = UserHabit::create([
            'user_id'     => $user->id,
            'habit_type'  => 'monthly',
        ]);

        MonthlyHabit::create([
            'user_habit_id'   => $monthly->id,
            'habit_name'      => 'Habbit Bulanan',
            'habit_description' => 'Gajian',
            'hour'            => '09:00',
            'schedule_type'   => 'date', // atau 'week'
            'date'            => 1, // tanggal 1 tiap bulan
        ]);

        // === HABIT KUSTOM ===
        $custom = UserHabit::create([
            'user_id'     => $user->id,
            'habit_type'  => 'custom',
        ]);
        
        CustomHabit::create([
            'user_habit_id'   => $custom->id,
            'habit_name'      => 'Habbit Kustom',
            'habit_description' => 'Gajian',
            'hour'            => '09:00',
            'day_count'       => 7,
        ]);

        // === TASK / TUGAS ===
        TaskUser::create([
            'user_id'         => $user->id,
            'task_name'       => 'Laporan KBR',
            'task_description'=> 'Laporan KBR',
            'due_date'        => '2025-12-30',
            'due_time'        => '23:59',
        ]);

        TaskUser::create([
            'user_id'         => $user->id,
            'task_name'       => 'Presentasi DABD',
            'task_description'=> 'Presentasi DABD',
            'due_date'        => '2025-12-30',
            'due_time'        => '23:59',
        ]);
        
        TaskUser::create([
            'user_id'         => $user->id,
            'task_name'       => 'Test besok',
            'task_description'=> 'Rawr',
            'due_date'        => '2025-12-26',
            'due_time'        => '23:59',
        ]);
        //
    }
}
