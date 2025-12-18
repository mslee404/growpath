<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PP extends Model
{
    protected $table = 'pps';
    protected $fillable = ['code', 'image'];

    public function users(){
        return $this->hasMany(UserGrowpath::class);
    }
}
