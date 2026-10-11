<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('dashboard'));

Route::view('/login', 'auth.login')->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
