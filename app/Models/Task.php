<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'priority',
        'progress',
        'estimated_time',
        'description',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_users');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'task_labels');
    }
}
