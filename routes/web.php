<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Habit\HabitController;
use App\Http\Controllers\HabitCheckin\HabitCheckinController;
use App\Http\Controllers\Task\TaskController;
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

    Route::post('/logout', [LogoutController::class, 'destroy'])
        ->name('logout');

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/tasks', [TaskController::class, 'create'])
        ->name('tasks.create');

    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');

    Route::put('/tasks/{task}', [TaskController::class, 'update'])
        ->name('tasks.update');

    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])
        ->name('tasks.edit');

    Route::patch('/tasks/{task}/mark-complete', [TaskController::class, 'markComplete'])
        ->name('tasks.mark-complete');

    Route::get('/habits', [HabitController::class, 'create'])
        ->name('habits.create');

    Route::post('/habits', [HabitController::class, 'store'])
        ->name('habits.store');

    Route::post('/habits/{habit}/check-in', [HabitCheckinController::class, 'store'])
        ->name('habits.check-in');
});
