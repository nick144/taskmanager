<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user =  User::factory()->create([
            'name' => 'John Wick',
            'email' => 'john.wick@mailinator.com',
            'password' => bcrypt('coldcold')
        ]);

        // Create 5 categories
        $categories = Category::factory()->count(5)->create();

        // Create 20 tasks assigned to the user and random categories
        Task::factory()->count(20)->create([
            'user_id' => $user->id,
            'category_id' => $categories->random()->id,
        ]);
    }
}
