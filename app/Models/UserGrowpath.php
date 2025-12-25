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
        return $this->hasMany(UserInventory::class);
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
    }

    public function getNameAttribute()
    {
        return $this->display_name ?? $this->username;
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->pp && $this->pp->image) {
            // Karena file di public/images/, gunakan asset() untuk full URL
            return asset($this->pp->image);
        }

        // Fallback kalau pp null atau image kosong: placeholder dengan inisial username
        $initial = strtoupper(substr($this->username ?? 'U', 0, 2));
        return 'https://placehold.co/92x92/4A6484/B0D2FA?text=' . $initial;
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
        $this->total_xp += $amount;
        $this->save();
    }
}
