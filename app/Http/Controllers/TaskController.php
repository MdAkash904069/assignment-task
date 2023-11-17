<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('tasks.index', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        Task::create($request->all());
        return redirect()->back()->with('success', 'Task Successfully Created.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, string $id)
    {
        Task::find($request->id)->update($request->all());
        return redirect()->back()->with('success', 'Task Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::find($id)->delete();
        return redirect()->back()->with('success', 'Task Successfully Deleted.');
    }
}
