<?php

namespace Database\Factories;

use App\Models\Pole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pole>
 */
class PoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $parent = Pole::inRandomOrder()->first()->id ?? null;

        return [
            'name' => $this->faker->word(),
            'parent_id' => $parent,
        ];
    }
}
