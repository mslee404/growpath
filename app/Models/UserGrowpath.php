<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGrowpath extends Model
{
    protected $table = 'user_growpaths';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_user',
        'username',
        'password',
        'diplay_name',
        'total_xp',
        'level',
        'total_gold',
        'pp_id',
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function ($model) {
            $last = self::orderBy('id_user', 'desc')->first();
            $num = 1;
            if ($last) {
                $lastNum = (int) substr($last->id_item, 2);
                $num = $lastNum + 1;
            }
            $model->id_user = str_pad($num, 4, '0', STR_PAD_LEFT);
        });
    }

    public function pp()
    {
        return $this->belongsTo(PP::class, 'pp_id', 'id_pp');
    }
}
