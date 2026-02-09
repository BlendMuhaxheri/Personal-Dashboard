<?php

namespace Tests\Feature;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
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
        $user = User::factory()
            ->has(
                Task::factory()
                    ->count(2)
                    ->state([
                        'due_date' => today(),
                    ])
            )
            ->create();

        $task = $user->tasks->first();

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText($task->title)
            ->assertSeeText('+ Add Task')
            ->assertSee(route('tasks.create'))
            ->assertSeeText('Mark Complete')
            ->assertSee(route('tasks.mark-complete', $task));
    }

    public function test_it_shows_overdue_tasks()
    {

        $user = User::factory()
            ->has(
                Task::factory()
                    ->count(1)
                    ->state([
                        'due_date' => today()->subDay(),
                        'status' => TaskStatus::ACTIVE,
                        'priority' => TaskPriority::HIGH
                    ])
            )
            ->create();

        $task = $user->tasks->first();

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSeeText('Overdue')
            ->assertSeeText('Here comes the text overdue')
            ->assertSee($task->title);
    }
}
