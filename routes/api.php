<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// get list of tasks
Route::get('tasks','TaskController@index');
// get specific task
Route::get('task/{id}','TaskController@show');

// create new task
//Route::post('task','TaskController@store');
Route::post('task','TaskController@tambah');


// update existing task
//Route::put('task','TaskController@store');
Route::put('task/{id}','TaskController@update');

// delete a task
Route::delete('task/{id}','TaskController@destroy');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

