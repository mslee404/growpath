<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHabit extends Model
{
    protected $table = 'user_habits';
    public $incrementing = false;
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

    public function habit(){
        return match ($this->habit_type) {
            'daily' => $this->belongsTo(HabitDaily::class, 'id_habit', 'id_habit'),
            'weekly' => $this->belongsTo(HabitWeekly::class, 'id_habit', 'id_habit'),
            'monthly' => $this->belongsTo(HabitMonthly::class, 'id_habit', 'id_habit'),
            'custom' => $this->belongsTo(HabitCustom::class, 'id_habit', 'id_habit'),
            default => null,
        };
    }

}
