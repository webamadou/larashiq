<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = ['Acheter', 'Louer', 'Vendre', 'Conseil', 'Nos réalisations', 'Faire gérer', 'Aménagement', 'Syndic',
            'Conciergerie'];
        PostCategory::truncate();

        foreach ($defaults as $category) {
            PostCategory::factory()->create(['name' => $category]);
        }
    }
}
