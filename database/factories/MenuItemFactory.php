<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $menu = Menu::inRandomOrder()->first() ?? Menu::factory()->create();

        return [
            'name' => $this->faker->words(2, true),
            'menu_id' => $menu->id,
            'page_id' => null,
            'url' => '#',
            'description' => '',
            'roles' => null,
            'public' => 1,
            'position' => 1,
            'visible' => true,
        ];
    }
}
