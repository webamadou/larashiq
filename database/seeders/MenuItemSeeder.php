<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postBuy = Post::ofCategory(1)->pluck('name', 'slug');
        $menuItems = [
            1 => [
                ['Appartements et maisons', route('acquisition-type-buy-home-flat'), 1],
                ['Immobiliers neufs', route('buy-categorie', 'immobiliers_neufs'), 1],
                ['Immeubles', route('acquisition-type-buy', 'immeuble'), 1],
                ['Immobiliers professionnels', route('acquisition-type-buy', 'immobiliers_professionnels'), 1],
                ["Biens à l'international", route('acquisition-type-buy', 'biens_a_linternational'), 1],
                ['Créer une alerte mail', route('create-alert'), 2],
                ['Prendre rendez-vous', route('create-meeting'), 2],
            ],
            2 => [
                ['Appartements et maisons', route('acquisition-type-rent-home-flat'), 1],
                ['Immobiliers neufs', route('rent-categorie', 'immobiliers_neufs'), 1],
                ['Immeubles', route('acquisition-type-rent', 'immeuble'), 1],
                ['Immobiliers professionnels', route('acquisition-type-rent', 'immobiliers_professionnels'), 1],
                ["Biens à l'international", route('acquisition-type-rent', 'biens_a_linternational'), 1],
                ['Créer une alerte mail', route('create-alert'), 2],
                ['Prendre rendez-vous', route('create-meeting'), 2],
            ],
            3 => [
                ['Estimer en ligne la valeur de mon bien', route('create-estimation'), 1],
                ['Prendre rendez-vous', route('create-meeting'), 1],
                [
                    'Conseil 1',
                    route('see-page', Str::slug('Conseil 1', '_')),
                    2
                ],
                [
                    'Conseil 2',
                    route('see-page', Str::slug('Conseil 1', '_')),
                    2
                ],
                [
                    'Conseil 3',
                    route('see-page', Str::slug('Conseil 1', '_')),
                    2
                ],
                [
                    "Voir tous nos conseils",
                    route('see-post-categories', Str::slug("Vendre", '_')),
                    2
                ]
            ],
            4 => [
                ['Le mandat de gestion locative', route('see-page', Str::slug('Le mandat de gestion locative', '_')),
                    1],
                ['Le mandat de location', route('see-page', Str::slug('Le mandat de location', '_')), 1],
                [
                    'Le mandat de location saisonnière',
                    route('see-page', Str::slug('Le mandat de location saisonnière', '_')),
                    1
                ],
                ['Travaux/Réfections', route('see-page', Str::slug('Travaux/Réfections', '_')), 1],
                ['Prendre rendez-vous', route('see-page', 3), 1],
                [
                    'Estimer en ligne le loyer de votre bien',
                    route('see-page', Str::slug('Estimer en ligne le loyer de votre bien', '_')),
                    2
                ],
                [
                    'Estimer en agence le loyer de votre bien',
                    route('see-page', Str::slug('Estimer en agence le loyer de votre bien', '_')),
                    2
                ],
                [
                    'Pourquoi estimer avant de vendre ?',
                    route('see-post', Str::slug('Pourquoi estimer avant de vendre ?', '_')),
                    3
                ],
                [
                    "Comprendre l'estimation immobilière",
                    route('see-post', Str::slug("Comprendre l'estimation immobilière", '_')),
                    3
                ],
                [
                    "Voir tous les conseils",
                    route('see-post-categories', Str::slug("Faire gérer", '_')),
                    3
                ]
            ],
            5 => [
                ['Nos projets', route('see-page', Str::slug('Nos projets', '_')), 1],
                ['Prendre rendez-vous', route('create-meeting'), 1],
                ['Décoration intérieure', route('see-page', Str::slug('Décoration intérieure', '_')), 2],
                ['Pack ammeublement', route('catalogues'), 2],
                ['Home staging', route('see-page', Str::slug('Home staging', '_')), 2],
            ],
            6 => [
                ['Le mandat de syndic', route('see-page', Str::slug('Le mandat de syndic', '_')), 1],
                ['Extranet copropriétaire', route('see-page', Str::slug('Extranet copropriétaire', '_')), 1],
                ['Prise de rendez-vous', route('see-page', Str::slug('Prise de rendez-vous', '_')), 1],
            ]
        ];
        $buyMenus = Post::ofCategory(1)->select('name', 'slug')->limit(3)
            ->get()
            ->map(fn ($p) => [$p->name, route('see-post', $p->slug), 3])->toArray();
        $rentMenus = Post::ofCategory(2)->select('name', 'slug')->limit(3)
            ->get()
            ->map(fn ($p) => [$p->name, route('see-post', $p->slug), 3])->toArray();
        $sellMenus = Post::ofCategory(3)->select('name', 'slug')->limit(3)
            ->get()
            ->map(fn ($p) => [$p->name, route('see-post', $p->slug), 3])->toArray();
        $faireGerer = Page::limit(3)
            ->get()
            ->map(fn ($p) => [$p->name, route('see-page', $p->slug), 3])->toArray();
        $conseilSellMenus = Post::ofCategory(4)->select('name', 'slug')
            ->get()
            ->map(fn ($p) => [$p->name, route('see-post', $p->slug), 3])->toArray();
        $amenagementMenus = Post::ofCategory(6)->select('name', 'slug')->limit(3)
            ->get()
            ->map(fn ($p) => [$p->name, route('see-post', $p->slug), 3])->toArray();
        $syndicMenus = Post::ofCategory(7)->select('name', 'slug')->limit(3)
            ->get()
            ->map(fn ($p) => [$p->name, route('see-post', $p->slug), 2])->toArray();

        foreach ($menuItems as $key => $menus) {
            // If we are on menu 1 or 2 we need to add articles of the same categ to the menu
            if ($key === 1) {
                $menus = array_merge($menus, $buyMenus);
            }
            if ($key === 2) {
                $menus = array_merge($menus, $rentMenus);
            }
            if ($key === 3) {
                $menus = array_merge($menus, $sellMenus);
            }
            /*if ($key === 4) {
                $menus = array_merge($menus, $faireGerer);
            }*/
            if ($key === 5) {
                $menus = array_merge(
                    array_merge($menus, $amenagementMenus),
                    [['Voir tous nos conseils', route('see-post-categories', Str::slug('Aménagement')), 2]]
                );
            }
            if ($key === 6) {
                $menus = array_merge(
                    array_merge($menus, $syndicMenus),
                    [['Voir tous nos conseils', route('see-post-categories', Str::slug('Syndic')), 2]]
                );
            }

            foreach ($menus as $i => $item) {
                [$name, $url, $column] = $item;
                MenuItem::factory()->create([
                    'name' => $name,
                    'url' => $url,
                    'column' => $column,
                    'menu_id' => $key
                ]);
            }
        }
    }
}
