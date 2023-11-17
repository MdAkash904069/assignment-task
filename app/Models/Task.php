<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['title', 'start_date', 'end_date', 'note', 'project_id', 'status'];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function task_dependencies(){
        return $this->hasMany(TaskDependency::class);
    }
}
