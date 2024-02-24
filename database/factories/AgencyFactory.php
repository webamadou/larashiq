<?php

namespace Database\Factories;

use App\Models\Alert;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alert>
 */
class AgencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name' => implode(' ', $this->faker->words(3)),
            'slogan' => implode('. ', $this->faker->sentences()),
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'exist_since' => $this->faker->year('now'),
            'is_sablux' => rand(0, 1),
            'is_partner' => rand(0, 1),
        ];
    }
}
