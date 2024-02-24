<?php

namespace Database\Factories;

use App\Models\Commodity;
use App\Models\Estimation;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estimation>
 */
class EstimationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $propertyType = PropertyType::inRandomOrder()->first()?->id ?? PropertyType::factory()->create()->id;
        $user = User::inRandomOrder()->first()?->id ?? User::factory()->create()->id;
        $nbrRoom = rand(2, 10);
        $nbrBedRoom = $nbrRoom < 5 ? rand(3, 5) : rand(4, 9);
        $surface = rand(10, 35);
        $livingRoom = $surface < 10 ? rand(9, 10) : rand(10, 15);
        $commodities = Commodity::inRandomOrder()->limit(15, 25)->get()->pluck('id')->all();

        return [
            'address' => $this->faker->address(),
            'property_type_id' => $propertyType,
            'user_id' => $user,
            'built_year' => rand(2010, 2021),
            'nbr_rooms' => $nbrRoom,
            'nbr_bed_rooms' => $nbrBedRoom,
            'surface' => $surface,
            'living_room_surface' => $livingRoom,
            'nbr_water_room' => rand(1, $nbrRoom),
            'nbr_bathroom' => rand(1, 2),
            'commodities' => json_encode($commodities),
            'heating_system' => Property::HEATING_SYSTEM_GAZ,
            'general_condition' => rand(Property::GENERAL_CONDITION_EXCELLENT, Property::GENERAL_CONDITION_AVERAGE),
            'kitchen_type' => rand(Property::KITCHEN_TYPE_UNFURNISHED, Property::KITCHEN_TYPE_EQUIPPED),
            'nbr_parking' => rand(2, 5),
            'description' => $this->faker->paragraphs(1, true),
            'phone_number' => $this->faker->phoneNumber(),
            'status' => rand(Estimation::STATUS_PENDING, Estimation::STATUS_PROCESSED),
        ];
    }
}
