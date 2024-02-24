<?php

namespace Database\Factories;

use App\Models\Alert;
use App\Models\Localisation;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alert>
 */
class AlertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $acquisitions = [
            Property::ACQUISITION_BUY,
            Property::ACQUISITION_RENT,
            ];
        $frequencies = [
            Alert::FREQ_WEEKLY,
            Alert::FREQ_MONTHLY,
            Alert::FREQ_REAL_TIME,
            ];
        $user = User::inRandomOrder()->first()?->id ?? User::factory()->create()->id;
        $localisation = Localisation::inRandomOrder()->first()?->id ?? Localisation::factory()->create()->id;

        return [
            'acquisition' => Arr::random($acquisitions),
            'localisation_id' => $localisation,
            'rooms_range' => json_encode(['min' => rand(1, 3), 'max' => rand(4, 10)]),
            'budget_range' => json_encode(['min' => rand(200000, 10000000), 'max' => rand(10000000, 20000000)]),
            'surface_range' => json_encode(['min' => rand(100, 200), 'max' => rand(500, 1000)]),
            'bed_room_range' => json_encode(['min' => rand(0, 2), 'max' => rand(3, 10)]),
            'commodities' => '',
            'floor_range' => json_encode(['min' => rand(1, 2), 'max' => rand(3, 20)]),
            'frequency' => Arr::random($frequencies),
            'user_id' => $user,
            'nbr_sent' => rand(0, 20),
            'last_sent' => Carbon::now()->subDays(rand(0, 600)),
            'active' => rand(0, 1),
        ];
    }
}
