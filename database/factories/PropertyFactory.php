<?php

namespace Database\Factories;

use App\Models\Acquisition;
use App\Models\Category;
use App\Models\City;
use App\Models\Commodity;
use App\Models\Country;
use App\Models\LocationType;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $location = LocationType::inRandomOrder()->first()->id ?? null;
        $property = PropertyType::isRoot()->inRandomOrder()->first()->id ?? PropertyType::factory()->create()->id;
        $category = Category::inRandomOrder()->first()->id ?? null;
        $country = Country::inRandomOrder()->first()->id ?? null;
        $city = City::inRandomOrder()->first()->id ?? null;
        $commodities = Commodity::all('id')->toArray();
        $availables = \App\Models\Availability::all()->random();
        $coordinates = [
            [14.7206535, -17.4953289],
            [14.720739, -17.5281597],
            [14.7287413, -17.4713585],
            [14.7528065, -17.4950504],
            [14.7408533, -17.5387548],
            [14.7016571, -17.4625268],
            [14.7016828, -17.4690929],
        ];

        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(10),
            'owner' => \App\Models\User::getOwners()->random()->id,
            'property_type_id' => $property,
            'location_type_id' => $location,
            'category_id' => $category,
            'country_id' => $country,
            'city_id' => $city,
            'availability_id' => $availables['id'],
            'property_usage_id' => rand(1, 2),
            'total_surfaces' => $this->faker->numberBetween(100, 500),
            'furnished' => rand(0, 1),
            'base_price' => $this->faker->numberBetween(110000, 110000000000),
            'montant_syndic' => null,
            'deposit_percentage' => $this->faker->randomFloat(1, 0.1, 3),
            'vta_rate' => $this->faker->randomFloat(1, 0.1, 3),
            'tom_tax_rate' => $this->faker->randomFloat(1, 0.1, 3),
            'tlv_tax_rate' => $this->faker->randomFloat(1, 0.1, 3),
            'commission_rate' => $this->faker->randomFloat(1, 0.1, 3),
            'commission_percentage' => $this->faker->randomFloat(1, 0.1, 3),
            'bail_percentage' => $this->faker->randomFloat(1, 0.1, 3),
            'property_tax' => $this->faker->randomFloat(1, 0.1, 3),
            'additional_charges' => $this->faker->randomFloat(1, 0.1, 3),
            'generate_total_cost' => $this->faker->numberBetween(200000, 20000000),
            'acquisition_type' => Acquisition::SALE,
            'zone' => $this->faker->numberBetween(1, 3),
            'stage' => $this->faker->numberBetween(1, 3),
            'position' => $this->faker->numberBetween(1, 12),
            'street' => $this->faker->streetAddress(),
            'apartment_number' => $this->faker->numberBetween(1, 300),
            'nbr_rooms' => $this->faker->numberBetween(1, 12),
            'nbr_bedrooms' => $this->faker->numberBetween(1, 12),
            'nbr_bathrooms' => $this->faker->numberBetween(1, 12),
            'nbr_showerrooms' => $this->faker->numberBetween(1, 12),
            'nbr_lounge_rooms' => $this->faker->numberBetween(1, 12),
            'nbr_kitchens' => $this->faker->numberBetween(1, 12),
            'holidays_good' => null,
            'json_commodities' => json_encode($commodities),
            'property_width' => $this->faker->numberBetween(60, 450),
            'stay_area' => $this->faker->numberBetween(60, 450),
            'nbr_mitoyennete' => 1,
            'electric_gate' => 1,
            'has_basement' => 1,
            'garden' => 1,
            'nbr_cellars' => 1,
            'land_area' => 300,
            'nbr_balconies' => 3,
            'nbr_terraces' => 3,
            'heating_system' => 1,
            'property_state' => 1,
            'nbr_views' => 3,
            'coordinates' => json_encode($coordinates[rand(0, 6)]),
        ];
    }
}
