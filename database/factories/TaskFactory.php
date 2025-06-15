<?php

namespace Database\Factories;

use App\Models\Category;
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
            'user_id' => User::inRandomOrder()->first()->id, // Creates a user if not passed manually
            'category_id' => Category::inRandomOrder()->first()->id, // Creates a category if not passed manually
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'due_date' => $this->faker->optional()->dateTimeBetween('+1 day', '+1 month'),
            'status' => $this->faker->randomElement(['pending', 'in-progress', 'completed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
        ];
    }
}
