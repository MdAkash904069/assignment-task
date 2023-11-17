<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskProgressController;
use App\Http\Controllers\GanttChartController;
use App\Http\Controllers\TaskDependencyController;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setLocal/{lang}', function ($lang) {

    if (! in_array($lang, ['en', 'bn'])) {
        abort(400);
    }
    App::setLocale($lang);
    session()->put('lang', $lang);
    return redirect()->back();
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('taskProgress', TaskProgressController::class);
    Route::get('task_update', [TaskProgressController::class, 'task_update']);
    Route::resource('ganttChart', GanttChartController::class);
    Route::get('gantt-chart-data', [GanttChartController::class, 'loadData']);
    Route::resource('taskDependency', TaskDependencyController::class);

});
