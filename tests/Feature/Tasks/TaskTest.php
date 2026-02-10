<?php

namespace Tests\Feature\Tasks;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_task()
    {
        $user = User::factory()->create();

        $this->loginAsUser($user);

        $response = $this->post(route('tasks.store'), [
            'title'    => 'This is the content of the task',
            'due_date' => today(),
            'priority' => TaskPriority::HIGH->value
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('tasks', [
            'user_id' => $user->id,
            'title'   => 'This is the content of the task',
        ]);
    }
}
