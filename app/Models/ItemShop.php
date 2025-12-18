<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemShop extends Model
{
    protected $fillable = [
        'code',
        'type',
        'price',
        'image',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {

            $prefix = match ($model->type) {
                'avatar'        => 'A',
                'avatar_frame'  => 'F',
                'tanaman'       => 'T',
                'background'    => 'B',
                default         => 'X',
            };

            $last = self::where('code', 'like', $prefix.'%')
                        ->orderBy('code', 'desc')
                        ->first();

            $num = $last ? ((int) substr($last->code, 1)) + 1 : 1;

            $model->code = $prefix . str_pad($num, 4, '0', STR_PAD_LEFT);
        });
    }
    
    public function inventories()
    {
        return $this->hasMany(UserInventory::class, 'item_shop_id');
    }

}

