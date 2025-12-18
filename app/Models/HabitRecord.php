<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitRecord extends Model
{
    protected $fillable = [
        'user_habit_id',
        'completion_date',
        'xp_earned',
    ];

    protected $casts = [
        'completion_date' => 'date',
    ];

    public function userHabit()
    {
        return $this->belongsTo(UserHabit::class);
    }
}
