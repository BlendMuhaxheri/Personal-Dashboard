<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->group(function () {
        Route::get('/login', [AuthController::class, 'create'])
            ->name('login');

        Route::post('/login', [AuthController::class, 'store']);

        Route::get('/register', [RegisterController::class, 'create'])
            ->name('register');

        Route::post('/register', [RegisterController::class, 'store']);
    });


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/tasks', [TaskController::class, 'create'])
        ->name('tasks.create');

    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');

    Route::get('/tasks/edit', [TaskController::class, 'edit'])
        ->name('tasks.edit');

    Route::get('/habits', [HabitController::class, 'create'])
        ->name('habits.create');

    Route::post('/habits', [HabitController::class, 'store'])
        ->name('habits.store');
});
