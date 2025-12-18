<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyHabit extends Model
{
    protected $table = 'monthly_habits';
    protected $primaryKey = 'id_habit';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_habit_id',
        'habit_name',
        'habit_description',
        'hour',
        'schedule_type',
        'day',
        'week',
        'date',
    ];

    public function userHabit()
    {
        return $this->belongsTo(UserHabit::class);
    }
}
