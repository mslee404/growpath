<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemShop extends Model
{
    protected $table = 'item_shops';
    protected $primaryKey = 'id_item';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_item',
        'type',
        'price',
        'image',
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function ($model) {

         $prefix = match (strtolower($model->type)) {
            'avatar' => 'A',
            'avatar frame'=> 'F' ,
            'tanaman' => 'T',
            'background' => 'B',
            default => 'X',
        };

        $last = self::where('id_item', 'like', $prefix . '%')->orderBy('id_item', 'desc')->first();
        $num = 1;
        if ($last) {
            $lastNum = (int) substr($last->id_item, 1);
            $num = $lastNum + 1;
        }
        $model->id_item = $prefix . str_pad($num, 4, '0', STR_PAD_LEFT);
        });
        
    }
}
