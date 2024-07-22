<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function progress()
    {
        $totalTasks = $this->tasks()->count();
        $completedTasks = $this->tasks()->where('status', 'Completed')->count();

        return $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;
    }
}
