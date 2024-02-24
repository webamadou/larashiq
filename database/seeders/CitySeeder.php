<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultCities = [
            'Dakar',
            'Guédiawaye',
            'Pikine',
            'Rufisque',
            'Saly',
            'Saint Louis',
            'Touba'
        ];
        $country = Country::getSenegal();
        collect($defaultCities)->each(
            fn ($city) => City::factory()->create(['name' => $city, 'country_id' => $country->id])
        );
    }
}
