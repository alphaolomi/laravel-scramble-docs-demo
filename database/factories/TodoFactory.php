<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'sub_title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'is_completed' => fake()->boolean(),
            'completed_at' => fake()->dateTime(),
            'due_date' => fake()->dateTime(),
            'parent_id' => null,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
