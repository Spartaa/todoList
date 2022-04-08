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

Route::get('/', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
Route::get('/create-task', [\App\Http\Controllers\TaskController::class, 'create'])->name('createTask');
Route::post('/add-tasks', [\App\Http\Controllers\TaskController::class, 'store'])->name('storeTask');
