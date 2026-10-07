<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserHabit extends Model
{
    protected $table = 'user_habits';

    protected $fillable = [
        'user_id',
        'habit_type',
    ];

    // XP per centang, sumber tunggal untuk controller dan tampilan
    const XP = [
        'daily'   => 10,
        'weekly'  => 30,
        'monthly' => 60,
        'custom'  => 15,
    ];

    const CATEGORY = [
        'daily'   => 'harian',
        'weekly'  => 'mingguan',
        'monthly' => 'bulanan',
        'custom'  => 'kustom',
    ];

    public function userGrowpath()
    {
        return $this->belongsTo(UserGrowpath::class, 'user_id');
    }

    public function customHabit()
    {
        return $this->hasOne(CustomHabit::class);
    }

    public function dailyHabit()
    {
        return $this->hasOne(DailyHabit::class);
    }

    public function weeklyHabit()
    {
        return $this->hasOne(WeeklyHabit::class);
    }

    public function monthlyHabit()
    {
        return $this->hasOne(MonthlyHabit::class);
    }

    public function records()
    {
        return $this->hasMany(HabitRecord::class, 'user_habit_id');
    }

    public function detail()
    {
        return match ($this->habit_type) {
            'custom'  => $this->customHabit,
            'daily'   => $this->dailyHabit,
            'weekly'  => $this->weeklyHabit,
            'monthly' => $this->monthlyHabit,
            default   => null,
        };
    }

    public function xp(): int
    {
        return self::XP[$this->habit_type] ?? 10;
    }

    /**
     * Tanggal awal periode berjalan. Centang pada/after tanggal ini berarti
     * habit sudah selesai untuk periode ini.
     */
    public function periodStart(): Carbon
    {
        $today = Carbon::today();

        return match ($this->habit_type) {
            'weekly'  => $today->startOfWeek(),
            'monthly' => $today->startOfMonth(),
            'custom'  => $today->subDays(max(1, (int) $this->customHabit?->day_count) - 1),
            default   => $today,
        };
    }

    /** $lastDone: tanggal centang terakhir (mis. dari withMax), null = belum pernah. */
    public function isDoneThisPeriod($lastDone): bool
    {
        return $lastDone !== null && Carbon::parse($lastDone)->gte($this->periodStart());
    }
}
