<?php

namespace Database\Seeders;

use App\Models\Alert;
use App\Models\Commodity;
use App\Models\Localisation;
use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::Environment('local')) {
            for ($i=0; $i < 12; $i++) {
                $alert = Alert::factory()->create();
                PropertyType::inRandomOrder()->limit(rand(1, 7))
                    ->get()->map(fn ($property_type) =>
                        DB::table('alert_property_type')->insert(
                            [
                                'property_type_id' => $property_type->id,
                                'alert_id' => $alert->id,
                            ]
                        ));
                Localisation::inRandomOrder()->limit(rand(1, 7))
                    ->get()->map(fn ($localisation) =>
                    DB::table('alert_localisation')->insert(
                        [
                            'localisation_id' => $localisation->id,
                            'alert_id' => $alert->id,
                        ]
                    ));
                Commodity::inRandomOrder()->limit(rand(1, 7))
                    ->get()->map(fn ($commodity) =>
                    DB::table('alert_commodity')->insert(
                        [
                            'commodity_id' => $commodity->id,
                            'alert_id' => $alert->id,
                        ]
                    ));
            }
        } else {
            Schema::disableForeignKeyConstraints();
            Alert::truncate();
            Schema::enableForeignKeyConstraints();
        }
    }
}
