<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'name' => 'Andrea Largosta',
            'email' => 'andy@example.com',
            'password' => bcrypt('12345678')
        ]);

        Category::factory(10)->create();
        Post::factory(100)->create();
    }
}
