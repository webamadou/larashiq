<?php

namespace Database\Seeders;

use App\Models\Commodity;
use App\Models\Property;
use App\Models\User;
use App\Traits\KaylooAPIV1;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    use KaylooAPIV1;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // if we are in dev environment we seed some rand props
        if (App::Environment('local')) {
            for ($i = 0; $i < 50; $i++) {
                $prop = Property::factory()->create();
                $user = User::inRandomOrder()->first();
                DB::table('property_user')->insert(
                    [
                        'user_id' => $user->id,
                        'property_id' => $prop->id,
                        'is_favorite' => rand(0, 1),
                        'is_wishlist' => rand(0, 1),
                    ]
                );
                $jsonComm = json_decode($prop->json_commodities);
                foreach ($jsonComm as $comm) {
                    DB::table('commodity_property')->insert(
                        [
                            'commodity_id' => $comm->id,
                            'property_id' => $prop->id,
                        ]
                    );
                }
            }
        }

        // The method below will get the response from the API and save in DB if necessary
        $this->mapAPIToDB();
    }
}
