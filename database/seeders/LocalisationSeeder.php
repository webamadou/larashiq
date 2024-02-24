<?php

namespace Database\Seeders;

use App\Models\Localisation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class LocalisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! App::environment('local'))
            return;

        $defaultLocalisations = [
            ['name' => 'Almadies', 'city_id' => 1, 'latitude' => '14.744910', 'longitude' => '-17.520321'],
            ['name' => 'Mermoz-Sacré-Cœur', 'city_id' => 1, 'latitude' => '14.716340', 'longitude' => '-17.461860'],
            ['name' => 'Ngor', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Ouakam', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Yoff', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Fann-Point E-Amitié', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Gorée', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Gueule Tapée-Fass-Colobane', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Médina', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Plateau', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Biscuiterie', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Dieuppeul-Derklé', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Grand Dakar', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Hann-Bel Air', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'HLM', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Sicap-Liberté', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Cambérène', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Grand Yoff', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Parcelles Assainies', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Patte d\'Oie', 'city_id' => 1, 'latitude' => null, 'longitude' => null],
            ['name' => 'Golf Sud', 'city_id' => 2, 'latitude' => null, 'longitude' => null],
            ['name' => 'Médina Gounass', 'city_id' => 2, 'latitude' => null, 'longitude' => null],
            ['name' => 'Ndiarème Limoulaye', 'city_id' => 2, 'latitude' => null, 'longitude' => null],
            ['name' => 'Sam Notaire', 'city_id' => 2, 'latitude' => null, 'longitude' => null],
            ['name' => 'Wakhinane Nimzatt', 'city_id' => 2, 'latitude' => null, 'longitude' => null],
            ['name' => 'Dalifort', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Djidah-Thiaroye Kaw', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Guinaw Rail Nord', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Guinaw Rail Sud', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Pikine Est', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Pikine Nord', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Pikine Ouest', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Keur Massar', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Malika [fr]', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Yeumbeul Nor', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Yeumbeul Sud', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Diamaguène Sicap Mbao', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Mbao', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Thiaroye Gare', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Thiaroye Sur Mer', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Tivaouane Diaksao', 'city_id' => 3, 'latitude' => null, 'longitude' => null],
            ['name' => 'Rufisque Est', 'city_id' => 4, 'latitude' => null, 'longitude' => null],
            ['name' => 'Rufisque Nord', 'city_id' => 4, 'latitude' => null, 'longitude' => null],
            ['name' => 'Rufisque Ouest', 'city_id' => 4, 'latitude' => null, 'longitude' => null],
            ['name' => 'Bargny', 'city_id' => 4, 'latitude' => null, 'longitude' => null],
            ['name' => 'Diamnadio', 'city_id' => 4, 'latitude' => null, 'longitude' => null],
            ['name' => 'Jaxaay-Parcelle-Niakoul Rap', 'city_id' => 4, 'latitude' => null, 'longitude' => null],
            ['name' => 'Sébikotane', 'city_id' => 4, 'latitude' => null, 'longitude' => null],
            ['name' => 'Sendou', 'city_id' => 4, 'latitude' => null, 'longitude' => null],
            ['name' => 'Saly', 'city_id' => 5, 'latitude' => null, 'longitude' => null],
            ['name' => 'Saint Louis', 'city_id' => 6, 'latitude' => null, 'longitude' => null],
            ['name' => 'Mpal', 'city_id' => 6, 'latitude' => null, 'longitude' => null],
            ['name' => 'Fass Ngom', 'city_id' => 6, 'latitude' => null, 'longitude' => null],
            ['name' => 'Touba', 'city_id'=>7, 'latitude' => 14.8676421, 'longitude' => -15.9179083],
        ];
        collect($defaultLocalisations)->each(
            fn ($localisation) => Localisation::factory()->create($localisation)
        );
    }
}
