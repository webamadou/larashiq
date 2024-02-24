<?php

namespace Database\Seeders;

use App\Models\PropertyUsage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usages = ['Commercial','Habitation'];

        foreach ($usages as $usage) {
            PropertyUsage::factory()->create(['name' => $usage]);
        }
    }
}
