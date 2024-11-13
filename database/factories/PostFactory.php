<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->title();

        return [
            "title" => $title,
            "description" => $this->faker->paragraph(),
            "content" => $this->faker->paragraph(),
            "slug" => str($title)->slug()->value(),
        ];
    }
}