<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomHabit extends Model
{
    protected $table = 'custom_habits';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_habit',
        'habit_name',
        'habit_description',
        'hour',
        'day_count',
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function ($model) {
            $last = self::orderBy('id_habit', 'desc')->first();
            $num = 1;
            if ($last) {
                $lastNum = (int) substr($last->id_habit, 1);
                $num = $lastNum + 1;
            }
            $model->id_habit = 'HC' . str_pad($num, 4, '0', STR_PAD_LEFT);
        });
    }

    public function userHabits()
    {
        return $this->hasMany(UserHabit::class, 'id_habit', 'id_habit')->where('habit_type', 'custom');
    }


}
