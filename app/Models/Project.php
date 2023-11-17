<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes; 
    use HasFactory;

    protected $fillable = ['title', 'start_date', 'end_date', 'description'];

    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function pending_tasks(){
        return $this->hasMany(Task::class)->where('status', 0);
    }
    public function doing_tasks(){
        return $this->hasMany(Task::class)->where('status', 1);
    }
    public function done_tasks(){
        return $this->hasMany(Task::class)->where('status', 2);
    }
}
