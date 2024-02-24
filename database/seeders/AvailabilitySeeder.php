<?php

namespace Database\Seeders;

use App\Models\Availability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('availabilities')->delete();
        $availabilities = [
            [
                'id' => Availability::AVAILABLE,
                'name' => __('properties.AVAILABLE'),
                'icon' => 'fa-circle',
                'color' => 'text-green-600'
            ],
            [
                'id' => Availability::PENDING,
                'name' => __('properties.PENDING'),
                'icon' => 'fa-circle',
                'color' => 'text-blue-400'
            ],
            [
                'id' => Availability::SOLD_RENTED,
                'name' => __('properties.SOLD_RENTED'),
                'icon' => 'fa-circle',
                'color' => 'text-immopurple'
            ],
            [
                'id' => Availability::DISABLED,
                'name' => __('properties.DISABLED'),
                'icon' => 'fa-circle',
                'color' => 'text-red-600'
            ],
        ];
        collect($availabilities)->each(fn ($country) => Availability::factory()->create($country));
    }
}
