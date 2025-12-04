<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;  
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserGrowpath extends Authenticatable
{
    use HasFactory, Notifiable;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

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
