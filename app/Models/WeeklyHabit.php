<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklyHabit extends Model
{
    
    protected $fillable = [
        'user_habit_id',
        'habit_name',
        'habit_description',
        'hour',
        'day',
        'week',
        'date',
    ];

    public function userHabit()
    {
        return $this->belongsTo(UserHabit::class);
    }
}
