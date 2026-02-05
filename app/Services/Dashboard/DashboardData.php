<?php

namespace App\Services\Dashboard;

use App\Models\HabitCheckIn;
use App\Enums\TaskStatus;
use Illuminate\Support\Carbon;

class DashboardData
{
    public static function for($user): array
    {
        return [
            'stats'           => self::stats($user),
            'tasks'           => self::tasksToday($user),
            'habits'          => self::activeHabits($user),
            'overdueTasks'    => self::overdueTasks($user)
        ];
    }

    public static function tasksToday()
    {
        return $tasks = auth()->user()->tasks()
            ->where('status', TaskStatus::ACTIVE)
            ->whereDate('due_date', now())
            ->orderByDesc('priority')
            ->get();
    }

    public static function overdueTasks()
    {
        return $overdueTasks = auth()->user()
            ->tasks()
            ->overdueTasks()
            ->get();
    }

    public static function activeHabits()
    {
        return $habits = auth()->user()->habits()
            ->where('active', true)
            ->orderByDesc('id')
            ->get();
    }

    public static function stats($user): array
    {
        return [
            'tasksCreated'   => $tasksCreated   = auth()->user()->tasks()->count(),

            'tasksCompleted' => $tasksCompleted = auth()->user()->tasks()
                ->whereNotNull('completed_at')
                ->count(),

            'habitsCreated'   => $habitsCreated = auth()->user()->habits()->count(),

            'habitsCompleted' => $habitsCompleted = HabitCheckIn::where('user_id', auth()->id())
                ->whereDate('date', today())
                ->count(),

            'bestStreak'   => 7,
            'habitSuccess' => 80,

        ];
    }
}
