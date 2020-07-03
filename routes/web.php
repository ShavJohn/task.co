<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', "TaskController@index")->name("tasks.index");

Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/home', 'TaskController@task')->name('tasks.task');

    Route::post('/home', "TaskController@store")->name("tasks.store");

    Route::post('/status/{id}', "TaskController@statusChange")->name("tasks.statusChange");

    Route::get('/create', 'TaskController@create')->name('tasks.create');

    Route::get('/task/{id}', "TaskController@show")->name("tasks.show");

    Route::put('/task/{id}', "TaskController@update")->name("tasks.update");

    Route::delete('/task/{id}', "TaskController@destroy")->name("tasks.destroy");

    Route::get('/task/{id}/edit', "TaskController@edit")->name("tasks.edit");

});


Auth::routes();
