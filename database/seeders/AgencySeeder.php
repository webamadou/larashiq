<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agencies = [
            [
                'name' => 'Agence Point E',
                'email' => 'sablux@sabluxgroup.com',
                'phone_number' => '+221 33 869 60 30',
                'address' => 'Point E, rue PE-29 Dakar - Sénégal',
                'is_sablux' => 1,
                'is_partner' => 0,
            ],
            [
                'name' => 'Agence Saly',
                'email' => 'sablux@sabluxgroup.com',
                'phone_number' => '+221 78 581 55 55 +221 33 958 06 23',
                'address' => 'Saly, Thiès - Sénégal',
                'is_sablux' => 1,
                'is_partner' => 0,
            ]
        ];

        foreach ($agencies as $agency) {
            Agency::factory()->create($agency);
        }
    }
}
