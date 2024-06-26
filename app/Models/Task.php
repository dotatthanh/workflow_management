<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'title',
        'start_date',
        'end_date',
        'priority',
        'progress',
        'estimated_time',
        'description',
        'status',
        'parent_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_users');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'task_labels');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function subTasks() {
        return $this->hasMany(Task::class, 'parent_id');
    }

    public function isParent() {
        return $this->parent_id == null;
    }
}
