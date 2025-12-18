<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomHabit extends Model
{

    protected $fillable = [
        'id_habit',
        'habit_name',
        'habit_description',
        'hour',
        'day_count',
    ];

    public function userHabit()
    {
        return $this->belongsTo(UserHabit::class);
    }



}
