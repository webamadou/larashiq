<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = [
            'Conseil 1',
            'Conseil 2',
            'Conseil 3',
            'Conseil 4',
            'Conseil 5',
            'Conseil 6',
            'Le mandat de gestion locative',
            'Le mandat de location',
            'Le mandat de location saisonnière',
            'Travaux/Réfections',
            'Estimer en ligne le loyer de votre bien',
            'Estimer en agence le loyer de votre bien',
            'Nos projets',
            'Prendre rendez-vous',
            'Décoration intérieure',
            'Pack ammeublement',
            'Home staging',
            'Le mandat de syndic',
            'Extranet copropriétaire',
            'Prise de rendez-vous',
            'Conciergerie',
            'À propos',
            'Plan du site',
            'Informations légales',
            'Politique de protection des données'
        ];

        foreach ($defaults as $page) {
            Page::factory()->create(['name' => $page, 'is_default' => 1]);
        }
    }
}
