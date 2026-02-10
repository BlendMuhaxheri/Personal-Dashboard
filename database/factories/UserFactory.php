<?php

namespace Database\Factories;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Models\Habit;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function withTasksDueToday(int $count = 1)
    {
        return $this->has(
            Task::factory()
                ->count($count)
                ->state([
                    'due_date' => today(),
                ])
        );
    }

    public function withOverdueTasks(int $count = 1)
    {
        return $this->has(
            Task::factory()
                ->count($count)
                ->state([
                    'due_date' => today()->subDay(),
                    'status'   => TaskStatus::ACTIVE,
                    'priority' => TaskPriority::HIGH
                ])
        );
    }

    public function withHabits(int $count = 1)
    {
        return $this->has(
            Habit::factory()
                ->count($count)
        );
    }
}
