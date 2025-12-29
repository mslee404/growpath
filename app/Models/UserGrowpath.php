<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;  
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Str;

class UserGrowpath extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_growpaths';

    protected $fillable = [
        'username',
        'password',
        'display_name',
        'total_xp',
        'level',
        'total_gold',
        'pp_id',
    ];

    protected $casts = [
        'total_xp'   => 'integer',
        'level'      => 'integer',
        'total_gold' => 'integer',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function pp()
    {
        return $this->belongsTo(PP::class);
    }
    public function inventories()
    {
        return $this->hasMany(UserInventory::class, 'user_id');
    }
    public function habits()
    {
        return $this->hasMany(UserHabit::class,'user_id');
    }
    
    public function tasks()
    {
        return $this->hasMany(TaskUser::class, 'user_id');
    }

    protected static function booted()
        {
        static::creating(function ($user) {
            if (is_null($user->pp_id)) {
                $user->pp_id = 1; // Default PP ID
            }
        });

        static::created(function ($user) {
            $defaultItems = ItemShop::whereIn('name', ['Kakek Petani', 'Bude', 'Buah Apel'])->get();

            foreach ($defaultItems as $item) {
                UserInventory::create([
                    'user_id' => $user->id,
                    'item_shop_id' => $item->id,
                    'is_equipped' => $item->name === 'Buah Apel', 
                ]);
            }
        });
    }

    public function getNameAttribute()
    {
        return $this->display_name ?? $this->username;
    }

    public function getAvatarUrlAttribute()
    {
        // 1. Cek inventory yang is_equipped = true dan type = 'avatar'
        $equippedAvatar = $this->inventories()
            ->where('is_equipped', true)
            ->whereHas('item', fn($q) => $q->where('type', 'avatar'))
            ->with('item')
            ->first();

        if ($equippedAvatar && $equippedAvatar->item) {
            return asset($equippedAvatar->item->image);
        }

        // 2. Fallback ke PP lama (jika masih digunakan)
        if ($this->pp && $this->pp->image) {
            return asset($this->pp->image);
        }

        // 3. Fallback default
        $initial = strtoupper(substr($this->username ?? 'U', 0, 2));
        return 'https://placehold.co/92x92/4A6484/B0D2FA?text=' . $initial;
    }

    public function getFrameUrlAttribute()
    {
        $equipped = $this->inventories()
            ->where('is_equipped', true)
            ->whereHas('item', fn($q) => $q->where('type', 'avatar_frame'))
            ->with('item')
            ->first();

        return $equipped ? asset($equipped->item->image) : null;
    }

    public function getPlantUrlAttribute()
    {
        $equipped = $this->inventories()
            ->where('is_equipped', true)
            ->whereHas('item', fn($q) => $q->where('type', 'tanaman'))
            ->with('item')
            ->first();

        if ($equipped && $equipped->item) {
            // Path: public/images/Tanaman/nama-item-slug/Level X.svg
            // Menggunakan level dari inventory (agar bisa di-reset saat panen)
            $level = $equipped->level;
            $slug = Str::slug($equipped->item->name);
            
            return asset("images/Tanaman/{$slug}/Level {$level}.svg");
        }
        
        return null;
    }

    public function getBackgroundUrlAttribute()
    {
        $equipped = $this->inventories()
            ->where('is_equipped', true)
            ->whereHas('item', fn($q) => $q->where('type', 'background'))
            ->with('item')
            ->first();

        return $equipped ? asset($equipped->item->image) : null;
    }
       // XP yang dibutuhkan untuk naik level berikutnya (bisa diubah nanti)
    const XP_PER_LEVEL = 100;

    // Hitung level dari total_xp
    public function getLevelAttribute()
    {
        $totalXp = $this->attributes['total_xp'] ?? 0;
        return floor($totalXp / self::XP_PER_LEVEL) + 1; // mulai dari level 1
    }

    // XP saat ini di level ini (0–99)
    public function getCurrentXpAttribute()
    {
        $totalXp = $this->attributes['total_xp'] ?? 0;
        return $totalXp % self::XP_PER_LEVEL;
    }

    // Persentase untuk progress bar (0–100%)
    public function getXpPercentageAttribute()
    {
        return $this->current_xp . '%';
    }

    // Teks display seperti "25/100 xp"
    public function getXpDisplayAttribute()
    {
        return $this->current_xp . '/' . self::XP_PER_LEVEL . ' xp';
    }   

    public function addXp($amount)
    {
        $oldLevel = $this->level;
        $this->total_xp += $amount;
        $this->save();
        $newLevel = $this->level;

        // Jika naik level, naikkan juga level tanaman yang sedang dipakai
        if ($newLevel > $oldLevel) {
            $equippedPlant = $this->inventories()
                ->where('is_equipped', true)
                ->whereHas('item', fn($q) => $q->where('type', 'tanaman'))
                ->first();

            if ($equippedPlant && $equippedPlant->level < 10) {
                // Naikkan level tanaman sebanyak kenaikan level user
                // Tapi batasi max 10
                $levelsGained = $newLevel - $oldLevel;
                $equippedPlant->level = min($equippedPlant->level + $levelsGained, 10);
                $equippedPlant->save();
            }
        }
    }
}
