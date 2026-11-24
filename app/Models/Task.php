<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'task_date',
        'status',
        'is_archived',
    ];

    protected $casts = [
        'task_date' => 'date',
        'is_archived' => 'boolean',
    ];
}
