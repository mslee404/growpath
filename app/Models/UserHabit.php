<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHabit extends Model
{
    protected $table = 'user_habits';

    protected $fillable = [
        'id_user',
        'habit_type',
    ];

    public function userGrowpath()
    {
        return $this->belongsTo(UserGrowpath::class,'user_id');
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

    public function detail()
    {
        return match ($this->habit_type) {
            'custom' => $this->customHabit,
            'daily'  => $this->dailyHabit,
            'weekly' => $this->weeklyHabit,
            'monthly' => $this->monthlyHabit,
            default  => null,
        };
    }
}
