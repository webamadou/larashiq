<?php

namespace Database\Seeders;

use App\Models\Pole;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            RoleSeeder::class,
            UsersTableSeeder::class,
            LocationTypeSeeder::class,
            CategorySeeder::class,
            PostCategorySeeder::class,
            PageSeeder::class,
            PostSeeder::class,
            ConfigurationSeeder::class,
        ]);

        User::factory(10)->create();
    }
}
