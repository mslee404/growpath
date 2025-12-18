<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyHabit extends Model
{
    protected $fillable = [
        'user_habit_id',
        'habit_name',
        'habit_description',
        'hour',
    ];

    public function userHabit()
    {
        return $this->belongsTo(UserHabit::class);
    }
}
