<?php

namespace Tests\Feature;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Models\Habit;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_shows_todays_tasks()
    {
        $user = User::factory()->withTasksDueToday(2)->create();

        $task = $user->tasks->first();

        $this->loginAsUser($user);
        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText($task->title)
            ->assertSeeText('+ Add Task')
            ->assertSee(route('tasks.create'))
            ->assertSeeText('Mark Complete')
            ->assertSee(route('tasks.mark-complete', $task));
    }

    public function test_it_shows_overdue_tasks()
    {
        $user = User::factory()->withOverdueTasks()->create();

        $task = $user->tasks->first();

        $this->loginAsUser($user);
        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText('Overdue')
            ->assertSeeText('Here comes the text overdue')
            ->assertSee($task->title);
    }

    public function test_it_shows_habits()
    {
        $user = User::factory()->withHabits(2)->create();

        $habit = $user->habits()->first();

        $this->loginAsUser($user);
        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText("Habits")
            ->assertSee($habit->name)
            ->assertSee(route('habits.create'));
    }

    public function test_it_shows_progress_summary()
    {
        $user = User::factory()->create();

        $this->loginAsUser($user);
        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText('Progress Summary')
            ->assertSee([
                'Tasks Completed',
                'Habits Completed'
            ]);
    }
}
