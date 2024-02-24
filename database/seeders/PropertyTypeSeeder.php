<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        PropertyType::truncate();
        Schema::enableForeignKeyConstraints();

        $defaultTypes = [
            ['Villas', null],
            ['Appartements', null],
            ['f2', 2],
            ['f3', 2],
            ['f4', 2],
            ['f5', 2],
            ['f6', 2],
            ['Duplex', 2],
            ['Penthouses', 2],
            ['Magasins', null],
            ['Plateaux de bureau', null],
            ['Terrains', null],
            ['Immeubles']
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('property_types')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        collect($defaultTypes)->each(
            fn ($city) => PropertyType::factory()
                ->create([
                    'name' => ucfirst($city[0]),
                    'parent_id' => $city[1] ?? null
                ])
        );
    }
}
