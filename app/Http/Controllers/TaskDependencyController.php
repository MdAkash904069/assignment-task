<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Models\TaskDependency;
use App\Http\Requests\TaskDependency as TaskDependencyRequest;
use App\Http\Requests\TaskDependencyUpdate;
use Carbon\Carbon;

class TaskDependencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($task_id)
    {
        $task = Task::find($task_id);
        $project = Project::find($task->project_id);

        return view('tasks.dependency.index', compact('task', 'project', 'task_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskDependencyRequest $request)
    {
        TaskDependency::create($request->all());

        $fdate = $request->start_date;
        $tdate = $request->end_date;
        $datetime1 = strtotime($fdate); // convert to timestamps
        $datetime2 = strtotime($tdate); // convert to timestamps
        $days = (int)(($datetime2 - $datetime1)/86400); 
        $project = Project::find($request->project_id);
        $end_date = date('Y-m-d', strtotime($project->end_date. " + $days day"));
        
        $project->update(['end_date'=>$end_date]);

        return redirect()->back()->with('success', 'Task Dependency Successfully Created.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskDependencyUpdate $request, string $id)
    {
        TaskDependency::find($request->id)->update($request->all());

        $fdate = $request->start_date;
        $tdate = $request->end_date;
        $datetime1 = strtotime($fdate);
        $datetime2 = strtotime($tdate);
        $days = (int)(($datetime2 - $datetime1)/86400); 
        $project = Project::find($request->project_id);
        $end_date = date('Y-m-d', strtotime($project->end_date. " + $days day"));
        
        $project->update(['end_date'=>$end_date]);
        
        return redirect()->back()->with('success', 'Task Dependency Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TaskDependency::find($id)->delete();
        return redirect()->back()->with('success', 'Task Dependency Successfully Deleted.');
    }
}
