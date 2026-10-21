<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('dashboard'));

Route::view('/login', 'auth.login')->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('projects', ProjectController::class);

// shallow: create/store need the project in the URL, but show/edit/update/destroy only need the task id
Route::resource('projects.tasks', TaskController::class)->shallow()->except(['index']);
