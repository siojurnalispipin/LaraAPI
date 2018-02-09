<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Http\Requests;
 use App\Task;
 use App\Http\Resources\Task as TaskResource;
  
 class TaskController extends Controller
 {
     public function index()
     {
         //Get all task
         $tasks = Task::all();
  
         // Return a collection of $task with pagination
         return TaskResource::collection($tasks);
     }
  
     public function show($id)
     {
         //Get the task
         $task = Task::findOrfail($id);
  
         // Return a single task
         return new TaskResource($task);
     }
  
     public function destroy($id)
     {
         //Get the task
         $task = Task::findOrfail($id);
  
         if($task->delete()) {
             return new TaskResource($task);
         } 
  
     }
  
     //ini bawaan
    // public function store(Request $request)  {
  
    //      $task = $request->isMethod('put') ? Task::findOrFail($request->task_id) : new Task;
             
    //      $task->id = $request->input('task_id');
    //      $task->name = $request->input('name');
    //      $task->description = $request->input('description');
    //      $task->user_id =  1; //$request->user()->id;
  
    //      if($task->save()) {
    //          return new TaskResource($task);
    //      } 
         
    //  }
    

     //akhirnya yang ini bisa juga coek | Update \ PUT
     public function update($id, Request $r){
         $task = Task::find($id);
         
         $task->name = $r->input('name');
         $task->description = $r->input('description');
         if($task->save()) {
            return new TaskResource($task);
        }
     }

     //ini function untuk tambah data / POST
     public function tambah(Request $request)
     {
         $task = new Task;
         $task->id = $request->input('task_id');
         $task->name = $request->input('name');
         $task->description = $request->input('description');
         $task->user_id =  1; //$request->user()->id;
         if ($task->save()) {
             return $task;
         }
         throw new HttpException(400, "Invalid data");
     }     
 }