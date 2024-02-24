<?php

namespace Database\Factories;

use App\Models\PostCategory;
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
    public function definition()
    {
        $category = PostCategory::inRandomOrder()->first()->id ?? PostCategory::factory()->create()->id;
        return [
            'name' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'category_id' => $category,
            'active' => 1,
        ];
    }
}
