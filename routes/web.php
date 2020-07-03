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

    Route::resource('tasks', 'TaskController');

});


Auth::routes();
