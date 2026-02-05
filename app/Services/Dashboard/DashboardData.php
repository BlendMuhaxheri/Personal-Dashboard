<?php

namespace App\Services\Dashboard;

use App\Enums\TaskStatus;
use App\Models\HabitCheckIn;

class DashboardData
{
    public static function for($user): array
    {
        return [
            'stats'        => self::stats($user),
            'tasks'        => self::tasksToday($user),
            'habits'       => self::activeHabits($user),
            'overdueTasks' => self::overdueTasks($user),
        ];
    }

    public static function tasksToday($user)
    {
        return $user->tasks()
            ->where('status', TaskStatus::ACTIVE)
            ->whereDate('due_date', now())
            ->orderByDesc('priority')
            ->get();
    }

    public static function overdueTasks($user)
    {
        return $user->tasks()
            ->overdueTasks()
            ->get();
    }

    public static function activeHabits($user)
    {
        return $user->habits()
            ->where('active', true)
            ->orderByDesc('id')
            ->get();
    }

    public static function stats($user): array
    {
        return [
            'tasksCreated' => $user->tasks()->count(),

            'tasksCompleted' => $user->tasks()
                ->whereNotNull('completed_at')
                ->count(),

            'habitsCreated' => $user->habits()->count(),

            'habitsCompleted' => HabitCheckIn::where('user_id', $user->id)
                ->whereDate('date', today())
                ->count(),

            'bestStreak'   => 7,
            'habitSuccess' => 80,
        ];
    }
}
