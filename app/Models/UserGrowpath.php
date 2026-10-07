<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'total_gold',
        'pp_id',
    ];

    protected $casts = [
        'total_xp'   => 'integer',
        'total_gold' => 'integer',
        'password'   => 'hashed',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    const XP_PER_LEVEL = 100;
    const MAX_PLANT_LEVEL = 10;
    const DEFAULT_ITEMS = ['Kakek Petani', 'Bude', 'Buah Apel'];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->pp_id ??= PP::value('id');
        });

        static::created(function ($user) {
            foreach (ItemShop::whereIn('name', self::DEFAULT_ITEMS)->get() as $item) {
                UserInventory::create([
                    'user_id'      => $user->id,
                    'item_shop_id' => $item->id,
                    'is_equipped'  => $item->name === 'Buah Apel',
                ]);
            }
        });
    }

    public function pp()
    {
        return $this->belongsTo(PP::class);
    }

    public function inventories()
    {
        return $this->hasMany(UserInventory::class, 'user_id');
    }

    // Item yang sedang dipakai; dimuat sekali per request lalu dipakai semua accessor gambar
    public function equipped()
    {
        return $this->hasMany(UserInventory::class, 'user_id')->where('is_equipped', true)->with('item');
    }

    public function habits()
    {
        return $this->hasMany(UserHabit::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(TaskUser::class, 'user_id');
    }

    public function equippedOf(string $type): ?UserInventory
    {
        return $this->equipped->first(fn ($inv) => $inv->item?->type === $type);
    }

    public function getNameAttribute()
    {
        return $this->display_name ?? $this->username;
    }

    public function getAvatarUrlAttribute()
    {
        if ($avatar = $this->equippedOf('avatar')) {
            return asset($avatar->item->image);
        }

        if ($this->pp?->image) {
            return asset($this->pp->image);
        }

        $initial = strtoupper(substr($this->username ?? 'U', 0, 2));
        return 'https://placehold.co/92x92/4A6484/B0D2FA?text=' . $initial;
    }

    public function getFrameUrlAttribute()
    {
        $frame = $this->equippedOf('avatar_frame');
        return $frame ? asset($frame->item->image) : null;
    }

    public function getBackgroundUrlAttribute()
    {
        $bg = $this->equippedOf('background');
        return $bg ? asset($bg->item->image) : null;
    }

    public function getPlantUrlAttribute()
    {
        $plant = $this->equippedOf('tanaman');
        return $plant ? self::plantStageUrl($plant->item->name, $plant->level) : null;
    }

    // Path: public/images/Tanaman/<slug nama item>/Level N.svg
    public static function plantStageUrl(string $plantName, int $level): string
    {
        return asset('images/Tanaman/' . Str::slug($plantName) . '/' . rawurlencode("Level {$level}.svg"));
    }

    public function getLevelAttribute()
    {
        return intdiv($this->total_xp ?? 0, self::XP_PER_LEVEL) + 1;
    }

    public function getCurrentXpAttribute()
    {
        return ($this->total_xp ?? 0) % self::XP_PER_LEVEL;
    }

    public function getXpPercentageAttribute()
    {
        return $this->current_xp . '%';
    }

    public function getXpDisplayAttribute()
    {
        return $this->current_xp . '/' . self::XP_PER_LEVEL . ' xp';
    }

    /**
     * Tambah XP secara atomik. Setiap naik level user, tanaman yang dipakai naik satu stage (maks 10).
     *
     * @return array{name:string, from:int, to:int}|null perubahan stage tanaman, null kalau tidak berubah
     */
    public function addXp(int $amount): ?array
    {
        $oldLevel = $this->level;
        $this->increment('total_xp', $amount);
        $gained = $this->level - $oldLevel;

        if ($gained <= 0) {
            return null;
        }

        $plant = $this->inventories()
            ->where('is_equipped', true)
            ->whereHas('item', fn ($q) => $q->where('type', 'tanaman'))
            ->with('item')
            ->first();

        if (!$plant || $plant->level >= self::MAX_PLANT_LEVEL) {
            return null;
        }

        $from = $plant->level;
        $plant->update(['level' => min($from + $gained, self::MAX_PLANT_LEVEL)]);
        $this->unsetRelation('equipped');

        return ['name' => $plant->item->name, 'from' => $from, 'to' => $plant->level];
    }
}
