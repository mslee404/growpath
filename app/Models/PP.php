<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PP extends Model
{
    protected $table = 'pps';
    protected $primaryKey = 'id_pp';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pp', 'image'];

    protected static function boot(){
        parent::boot();

        static::creating(function ($model){
            $last = self::orderBy('id_pp', 'desc')->first();
            $num = 1;
            if ($last) {
                $lastNum = (int) substr($last->id_item, 2);
                $num = $lastNum + 1;
            }
            $model->id_pp = 'PP' . str_pad($num, 3, '0', STR_PAD_LEFT);
        });
    }
}
