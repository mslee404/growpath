<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoldPurchase extends Model
{
    protected $table = 'gold_purchases';
    
    protected $fillable = [
        'user_id',
        'package_id',
        'status',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(UserGrowpath::class, 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(GoldShop::class, 'package_id');
    }
}
