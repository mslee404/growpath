<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInventory extends Model
{
    protected $fillable = [
        'user_id',
        'item_shop_id',
        'is_equipped',
    ];

    public function user()
    {
        return $this->belongsTo(UserGrowpath::class, 'user_id');
    }

    public function item()
    {
        return $this->belongsTo(ItemShop::class, 'item_shop_id');
    }
}
