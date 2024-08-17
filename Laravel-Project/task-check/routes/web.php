<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks', [TasksController::class, 'index'])->name("tasks.index");
