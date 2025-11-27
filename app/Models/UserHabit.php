<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHabit extends Model
{
    protected $table = 'id_habits';
    public $incrementing = false;
    public $keyTyepe = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_habit',
        'habit_type',
    ];

public function userGrowpath()
    {
        return $this->belongsTo(UserGrowpath::class, 'id_user', 'id_user');
    }

    // RELASI KE TABEL ANAK (ini yang bikin "gak nyambung"!)
    public function customHabit()
    {
        return $this->hasOne(CustomHabit::class, 'id_habit', 'id_habit');
    }

    public function dailyHabit()
    {
        return $this->hasOne(DailyHabit::class, 'id_habit', 'id_habit');
    }

    public function weeklyHabit()
    {
        return $this->hasOne(WeeklyHabit::class, 'id_habit', 'id_habit');
    }

    // Optional: biar lebih gampang akses detail berdasarkan type
    public function detail()
    {
        return match ($this->habit_type) {
            'custom' => $this->customHabit,
            'daily'  => $this->dailyHabit,
            'weekly' => $this->weeklyHabit,
            default  => null,
        };
    }
}
