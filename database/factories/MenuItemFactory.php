<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Page;
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
        $page = Page::inRandomOrder()->first() ?? Page::factory()->create();

        return [
            'name' => $this->faker->word(),
            'menu_id' => $menu->id,
            'page_id' => $page->id,
            'url' => route('see-page', $page->slug),
            'description' => '',
            'roles' => null,
            'column' => rand(1, 3),
            'visible' => true,
        ];
    }
}
