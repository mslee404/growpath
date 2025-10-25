<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil_Picture extends Model
{
    protected $primaryKey = 'id_pp';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['image'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $last = self::orderBy('id_pp', 'desc')->first();
            $num = $last ? intval(substr($last->id_pp, 2)) + 1 : 1;
            $model->id_pp = 'pp' . $num;
        });
    }
}
