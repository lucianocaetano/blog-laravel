<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach($categories as $category) {
            $posts = Post::inRandomOrder()->take(rand(1, 4))->pluck('id')->toArray();
            $category->posts()->attach($posts);
        }
    }
}
