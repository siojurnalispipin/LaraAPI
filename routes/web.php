<?php
use App\Task;
use App\Http\Resources\Task as TaskResource;
use App\Http\Resources\TaskCollection;

Route::get('/', function () {
    return view('welcome');
});


//ini untuk menampilkan data collection
Route::get('/json', function () {
    $task = Task::all();
    return new TaskCollection($task);
    
});

//ini untuk pagination
Route::get('/json1', function () {
    $task = Task::paginate(3);
    return new TaskCollection($task);
    
});

//ini untuk menampilkan sebagian data
Route::get('/json2', function () {
    $task = Task::find(3);
    return new TaskResource($task);
    
});

Route::get('/task', function () {
    $task = Task::all();
    return $task;
});
