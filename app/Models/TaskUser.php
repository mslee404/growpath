<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    protected $table = 'user_tasks';

    const XP = 20;

    protected $fillable = [
        'user_id',
        'task_name',
        'task_description',
        'due_date',
        'due_time',
        'is_completed',
        'completed_at',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'completed_at' => 'datetime',
        'due_date' => 'date:Y-m-d', // format tetap saat di-JSON-kan (tanpa geser zona waktu)
        'due_time' => 'datetime:H:i',
    ];

    public function user()
    {
        return $this->belongsTo(UserGrowpath::class, 'user_id', 'id');
    }
}
