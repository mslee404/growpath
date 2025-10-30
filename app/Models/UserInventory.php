<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInventory extends Model
{
    protected $table = 'user_inventories';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'is_equipped',
        'id_item',
    ];

    public function userGrowpath()
    {
        return $this->belongsTo(UserGrowpath::class, 'id_user', 'id_user');
    }
    public function itemShop()
    {
        return $this->belongsTo(ItemShop::class, 'id_item', 'id_item');
    }
    
}
