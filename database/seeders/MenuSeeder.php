<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Menu::getDefaultMenus() as $key => $menu) {
            Menu::factory()->create(['name' => $menu, 'visible' => 1, 'menu_position' => 1]);
        }
    }
}
