<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskDependency extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['title', 'note', 'task_id', 'project_id', 'start_date', 'end_date'];

}
