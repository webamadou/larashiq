<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "iso" => $this->faker->name,
            "name" => $this->faker->name,
            "nicename" => $this->faker->name,
            "iso3" => $this->faker->name,
            "numcode" => $this->faker->name,
            "phonecode" => null,
        ];
    }
}
