<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Task'], function () {
    Route::get('/tasks', 'IndexController')->name('task.index');
    Route::post('/tasks', 'StoreController')->name('task.store');
    Route::get('/tasks/{task}/edit', 'EditController')->name('task.edit');
    Route::patch('/tasks/{task}', 'UpdateController')->name('task.update');
    Route::delete('/tasks/{task}', 'DestroyController')->name('task.destroy');
});

Auth::routes();

