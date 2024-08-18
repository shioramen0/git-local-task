<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks', [TasksController::class, 'index'])->name("tasks.index");
Route::get('/tasks/create', [TasksController::class, 'create'])->name("tasks.create");
Route::post('/tasks', [TasksController::class, 'store'])->name("tasks.store");
