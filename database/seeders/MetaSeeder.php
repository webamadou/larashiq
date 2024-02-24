<?php

namespace Database\Seeders;

use App\Models\Meta;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = [
            'home-page',
            'create-meeting',
            'html-testing',
            /* -- alerts routes -- */
            'create-alert',
            /* -- property routes -- */
            'all-biens',
            /* -- property estimation -- */
            'create-estimation',
            /* -- posts route */
            'blog',
            /* -- catalogue route */
            'catalogues',
            'agencies',
        ];
        $showPropertyRoutes = Property::all('slug')->map(fn ($prop) => route('show-property', $prop))->toArray();
        $showPageRoutes = \App\Models\Page::all('slug')->map(fn ($prop) => route('see-page', $prop))->toArray();
        $showPageRoutes = \App\Models\Page::all('slug')->map(fn ($prop) => route('see-page', $prop))->toArray();
        $showPostRoutes = Post::all('slug')->map(fn ($prop) => route('see-post', $prop))->toArray();
        $categories = PostCategory::pluck('id');
        $postCategoryRoutes = PostCategory::pluck('slug')->map(fn ($prop) => route('see-post-categories', $prop))->toArray();
        $showProgramRoutes = \App\Models\Program::all('slug')->map(fn ($prop) => route('show-program', $prop))->toArray();
        $showCatalogueRoutes = \App\Models\Catalogue::all('id')->map(fn ($prop) => route('see-catalogue', $prop))->toArray();

        $routes = collect($routes)->map(fn ($route) => route($route))->toArray() + $showPropertyRoutes + $showPageRoutes + $showPostRoutes + $postCategoryRoutes + $showProgramRoutes + $showCatalogueRoutes;

        collect($routes)
            ->map(fn ($route) => Meta::create([
                'url' => $route,
                'description' => '',
                'keywords' => null,
                'title' => null
            ]));
    }
}
