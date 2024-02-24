<?php

namespace Database\Seeders;

use App\Models\Commodity;
use App\Models\Estimation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class EstimationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! App::Environment('local'))
            return;

        for ($i=0; $i < 12; $i++) {
            $estimation = Estimation::factory()->create();
            Commodity::inRandomOrder()->limit(rand(1, 7))
                ->get()->map(fn ($commodity) =>
                DB::table('commodity_estimation')->insert(
                    [
                        'commodity_id' => $commodity->id,
                        'estimation_id' => $estimation->id
                    ]
                ));
        }
    }
}
