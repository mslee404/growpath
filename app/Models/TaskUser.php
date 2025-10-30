<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    protected $table = 'task_users';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_task',
        'task_name',
        'task_description',
        'due_date',
        'due_time',
        'is_completed',
        'id_user',
    ];

    
}
