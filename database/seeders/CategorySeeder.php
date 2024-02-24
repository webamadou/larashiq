<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categs = [
            'Immobiliers neufs',
            'Immobiliers professionnels',
            'Biens à l\'international',
            'En vogue',
        ];

        foreach ($categs as $categ) {
            Category::factory()->create(['name' => $categ]);
        }
    }
}
