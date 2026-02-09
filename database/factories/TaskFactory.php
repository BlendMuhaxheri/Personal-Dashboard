<?php

namespace Database\Factories;

use App\Enums\TaskPriority;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title'   => $this->faker->title,
            'description' => $this->faker->paragraph,
            'due_date' => fake()->dateTimeBetween('-5 days', '+5 days')
                ->format('Y-m-d'),
            'priority' => $this->faker->randomElement(TaskPriority::cases())->value,
        ];
    }
}
