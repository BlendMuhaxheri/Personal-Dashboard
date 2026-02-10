<?php

namespace App\Services\WeeklyReview;

use App\Models\Habit;
use Illuminate\Support\Collection;

class WeeklyReviewData
{
    public static function for($user): array
    {
        [$startDate, $endDate] = self::range();

        return [
            'startDate' => $startDate,
            'endDate'   => $endDate,
            'stats'     => self::stats($user, $startDate, $endDate),
            'habits'    => self::habitStats($user, $startDate, $endDate),
        ];
    }

    public static function range(): array
    {
        $startDate = now()->subWeek()->startOfWeek();
        $endDate   = now()->subWeek()->endOfWeek();

        return [$startDate, $endDate];
    }

    public static function stats($user, $startDate, $endDate): array
    {
        $tasksCreated   = $user->tasks()->createdTasks($startDate, $endDate)->count();
        $tasksCompleted = $user->tasks()->completedTasks($startDate, $endDate)->count();

        $completionRate = $tasksCreated > 0
            ? round(($tasksCompleted / $tasksCreated) * 100)
            : 0;

        return [
            'tasksCreated'   => $tasksCreated,
            'tasksCompleted' => $tasksCompleted,
            'completionRate' => $completionRate,
        ];
    }

    public static function habitStats($user, $startDate, $endDate): Collection
    {
        return $user->habits()->active()->withWeeklyCheckIns($startDate, $endDate)->get();
    }
}
