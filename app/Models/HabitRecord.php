<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitRecord extends Model
{
    protected $table = 'habit_records';
    protected $primaryKey = 'id_record';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_record', 'completion_date', 'xp_earned', 'id_habit'];

    protected static function boot(){
        parent::boot();

        static::creating(function ($model){
            $last = self::orderBy('id_record', 'desc')->first();
            $num = 1;
            if ($last) {
                $lastNum = (int) substr($last->id_record, 2);
                $num = $lastNum + 1;
            }
            $model->id_record = 'C' . str_pad($num, 3, '0', STR_PAD_LEFT);
        });
    }
}
