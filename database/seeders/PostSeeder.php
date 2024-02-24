<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*if (! App::Environment('local'))
            return;*/
        Post::truncate();
        $categs = PostCategory::pluck('id');
        // For the first three menus we create random posts
        foreach (range(1, 4) as $menu_id) {
            foreach (range(1, 7) as $key) {
                Post::factory()->create(['category_id' => $menu_id]);
            }
        }
        /*//Create articles for vendre categ vendre
        foreach (range(1, 12) as $menu_id) {
            Post::factory()->create(['category_id' => 3]);
        }
        //Create articles for vendre categ conseil
        foreach (range(1, 12) as $menu_id) {
            Post::factory()->create(['category_id' => 4]);
        }*/
        // Create articles for faire gerer
        $faireGerer = [
            "Pourquoi estimer avant de vendre ?",
            "Comprendre l'estimation immobilière"
            ];
        foreach ($faireGerer as $post) {
            Post::factory()->create(['name' => $post, 'category_id' => 6]);
        }
        Post::factory()->create(['name' => 'Parties communes - appartements', 'category_id' => 5]);
        Post::factory()->create(['name' => 'Retour sur investissement après ameublement', 'category_id' => 5]);
        // Create articles Aménagement and syndic
        foreach (range(7, 9) as $menu_id) {
            foreach (range(1, 12) as $post) {
                Post::factory()->create(['category_id' => $menu_id]);
            }
        }
        // Create articles Syndic
        /*foreach (range(1, 12) as $post) {
            Post::factory()->create(['category_id' => 7]);
        }*/
    }
}
