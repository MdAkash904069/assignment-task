<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class GanttChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.gantt_chart.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function loadData()
    {
        $projects = Project::with('tasks')->get();

        // Fetch tasks and dependencies from your database
        $tasks = Task::all(); // Example model name: Task

        // Format tasks and dependencies into Gantt-compatible format (usually JSON)
        $data = [];

        foreach ($projects as $project) {
            $data[] = [
                'id' => $project->id,
                'text' => $project->title,
                'start_date' => $project->start_date,
                'end_date' => $project->end_date,
                'parent' => $project->project_id,
                'dependencies' => $project->tasks
            ];
        }

        return response()->json(['data'=>$data]);

        return response()->json(['data'=>$ganttData]);
    }
}
