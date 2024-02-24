<?php

namespace Database\Seeders;

use App\Models\Pin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CorrectDakarCoodinatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pin::all()->each(function ($p) {
            $lat = $p->latitude;
            $lng = $p->longitude;
            $p->latitude = $lat < 14 || $lat > 15 ? $lng : $lat;
            $p->longitude = $lng > 1 || $lat < -17 ? -1 * $lat : $lng;

            $p->save();
        });
    }
}
