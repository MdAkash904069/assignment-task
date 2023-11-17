<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class TaskProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('projects.progress.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function task_update(Request $request){
        $task = Task::find($request->get_id);

        switch ($request->task_name) {
            case 'pending':
                $task->update(['status'=>0]);
                break;
            
            case 'doing':
                $task->update(['status'=>1]);
                break;
            
            case 'done':
                $task->update(['status'=>2]);
                break;

            default:
                break;
        }
        return response(['success', 'Successfully Updated Task']);
    }

}
