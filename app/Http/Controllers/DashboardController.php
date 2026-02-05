<?php

namespace App\Http\Controllers;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Models\Task;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

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
            'overdueTasks' => $overdueTasks
        ]);
    }
}
