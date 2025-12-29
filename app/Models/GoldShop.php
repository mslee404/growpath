<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoldShop extends Model
{
    protected $table = 'gold_shops';
    
    protected $fillable = [
        'name',
        'amount',
        'price',
        'xp',
    ];

    public function purchases()
    {
        return $this->hasMany(GoldPurchase::class, 'package_id');
    }
}
