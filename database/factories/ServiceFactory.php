<?php

namespace Database\Factories;

use App\Models\Pole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $parent = Pole::inRandomOrder()->first() ?? Pole::factory()->create();

        return [
            'name' => $this->faker->word,
            'pole_id' => $parent,
            'description' => $this->faker->paragraphs(2, true),
        ];
    }
}
