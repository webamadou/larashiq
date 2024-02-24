<?php

namespace Database\Seeders;

use App\Models\Commodity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commodities = [
            ['name' => 'Roller', 'si_naming' => 'ROLLER', 'slug' => 'roller', 'icon_classes' => 'mdi mdi-roller-skate'],
            ['name' => 'Salle multifonctions', 'si_naming' => 'MULTIPORPOSE_ROOM', 'slug' => 'multiporpose_room', 'icon_classes' => 'mdi mdi-sofa'],
            ['name' => 'Télé', 'si_naming' => 'TV', 'slug' => 'tv', 'icon_classes' => 'mdi mdi-television-classic'],
            ['name' => 'Balcon', 'si_naming' => 'BALCON', 'slug' => 'balcon', 'icon_classes' => 'mdi mdi-balcony'],
            ['name' => 'Fitness', 'si_naming' => 'FITNESS', 'slug' => 'fitness', 'icon_classes' => 'mdi mdi-weight-lifter'],
            ['name' => 'Garage', 'si_naming' => 'GARAGE', 'slug' => 'garage', 'icon_classes' => 'mdi mdi-garage'],
            ['name' => 'Eau chaude', 'si_naming' => 'HOTWATER', 'slug' => 'hotwater', 'icon_classes' => 'mdi mdi-water-thermometer'],
            ['name' => 'Terrasse', 'si_naming' => 'TERACE', 'slug' => 'terace', 'icon_classes' => 'mdi mdi-home-roof'],
            ['name' => 'Ascenseur', 'si_naming' => 'ELEVATOR', 'slug' => 'elevator', 'icon_classes' => 'mdi mdi-elevator-passenger'],
            ['name' => 'Gardiens', 'si_naming' => 'GARDIEN', 'slug' => 'gardien', 'icon_classes' => 'mdi mdi-shield-account-outline'],
            ['name' => 'Barbecue', 'si_naming' => 'BBQ', 'slug' => 'bbq', 'icon_classes' => 'mdi mdi-grill'],
            ['name' => 'Cave', 'si_naming' => 'CAVE', 'slug' => 'cave', 'icon_classes' => 'mdi mdi-warehouse'],
            ['name' => 'Climatisation', 'si_naming' => 'CLIM', 'slug' => 'clim', 'icon_classes' => 'mdi mdi-air-conditioner'],
            ['name' => 'Salle de jeu', 'si_naming' => 'GAME', 'slug' => 'game', 'icon_classes' => 'mdi mdi-gamepad-variant'],
            ['name' => 'Court de tennis', 'si_naming' => 'TENNIS', 'slug' => 'tennis', 'icon_classes' => 'mdi mdi-tennis'],
            ['name' => 'Câble', 'si_naming' => 'CABLE', 'slug' => 'cable', 'icon_classes' => 'mdi mdi-ethernet-cable'],
            ['name' => 'Chauffage', 'si_naming' => 'HEATER', 'slug' => 'heater', 'icon_classes' => 'mdi mdi-radiator'],
            ['name' => 'Salle d\'attente', 'si_naming' => 'WAITING_ROOM', 'slug' => 'waiting_room', 'icon_classes' => 'mdi mdi-sofa-outline'],
            ['name' => 'Conciergerie', 'si_naming' => 'CONCIERGE', 'slug' => 'concierge', 'icon_classes' => 'mdi mdi-shield-home'],
            ['name' => 'Jardin', 'si_naming' => 'GARDEN', 'slug' => 'garden', 'icon_classes' => 'mdi mdi-shovel'],
            ['name' => 'Digicode', 'si_naming' => 'DIGICODE', 'slug' => 'digicode', 'icon_classes' => 'mdi mdi-numeric-3-box'],
            ['name' => 'Vélo', 'si_naming' => 'VELO', 'slug' => 'velo', 'icon_classes' => 'mdi mdi-bike'],
            ['name' => 'Parking', 'si_naming' => 'PARKING', 'slug' => 'parking', 'icon_classes' => 'mdi mdi-parking'],
            ['name' => 'Interphone', 'si_naming' => 'INTERPHONE', 'slug' => 'interphone', 'icon_classes' => 'mdi mdi-card-account-phone-outline'],
            ['name' => 'Sport', 'si_naming' => 'SPORT', 'slug' => 'sport', 'icon_classes' => 'mdi mdi-run-fast'],
            ['name' => 'Internet', 'si_naming' => 'INTERNET', 'slug' => 'internet', 'icon_classes' => 'mdi mdi-web'],
            ['name' => 'Buanderie', 'si_naming' => 'LAUNDRY', 'slug' => 'laundry', 'icon_classes' => 'mdi mdi-washing-machine'],
            ['name' => 'Zone vert', 'si_naming' => 'GREEN', 'slug' => 'green', 'icon_classes' => 'mdi mdi-leaf-circle'],
            ['name' => 'Ordures', 'si_naming' => 'GARBAGE', 'slug' => 'garbage', 'icon_classes' => 'mdi mdi-delete-empty'],
            ['name' => 'Sécurité', 'si_naming' => 'SECURITY', 'slug' => 'security', 'icon_classes' => 'mdi mdi-cctv'],
            ['name' => 'Piscine', 'si_naming' => 'POOL', 'slug' => 'pool', 'icon_classes' => 'mdi mdi-pool'],
            ['name' => 'Bureau du syndic', 'si_naming' => 'SYNDIC_OFFICE', 'slug' => 'syndic_office', 'icon_classes'
            => 'mdi mdi-desk-lamp-on'],
            ['name' => 'Entretien et nettoyage', 'si_naming' => 'MAINTENANCE_CLAINING', 'slug' => 'maintenance_cleaning', 'icon_classes' => 'mdi mdi-vacuum'],
            ['name' => 'Surpresseur adapté', 'si_naming' => 'ADAPTED_BOOSTER', 'slug' => 'adapted_booster', 'icon_classes' => 'mdi mdi-pump'],
            ['name' => 'Groupe électrogéne', 'si_naming' => 'GENERATOR', 'slug' => 'generator', 'icon_classes' => 'mdi mdi-meter-electric'],
        ];

        collect($commodities)->each(fn ($commodity) => Commodity::firstOrCreate(
                            ['si_naming' => $commodity['si_naming']],
                            [
                                'name' => ucfirst($commodity['name']),
                                'slug' => $commodity['slug'],
                                'icon_classes' => ucfirst($commodity['icon_classes']),
                            ]
                        ));
        // collect($commodities)->each(fn ($commodity) => Commodity::factory()->create($commodity));
    }
}
