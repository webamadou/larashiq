<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $parent = Menu::inRandomOrder()->first()->id ?? null;

        return [
            'name' => $this->faker->words(2, true),
            'parent_id' => $parent,
            'visible' => $this->faker->numberBetween(0, 1),
            'public' => $this->faker->boolean(),
        ];
    }
}
