<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()
            ->where('status', TaskStatus::ACTIVE)
            ->whereDate('due_date', now())
            ->orderByDesc('priority')
            ->get();

        $overdueTasks = auth()->user()->tasks()
            ->where('status', TaskStatus::ACTIVE)
            ->whereDate('due_date', '<', now())
            ->where('priority', TaskPriority::HIGH)
            ->orderByDesc('priority')
            ->get();

        $habits = auth()->user()->habits()
            ->where('active', true)
            ->orderByDesc('id')
            ->get();

        return view('dashboard', [
            'tasks'        => $tasks,
            'habits'       => $habits,
            'overdueTasks' => $overdueTasks,
            'tasksCreated' => 5,
            'tasksCompleted' => 2,
            'habitsCreated' => 3,
            'habitsCompleted' => 1,
            'habitSuccess' => 80,
            'bestStreak' => 7,
        ]);
    }
}
