<?php

namespace App\Traits;

use App\Models\Acquisition;
use App\Models\City;
use App\Models\Commodity;
use App\Models\Country;
use App\Models\Image;
use App\Models\Localisation;
use App\Models\Pin;
use App\Models\Property;
use App\Models\PropertyType;
use App\Utilities\DownloadKaylooImg;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

trait KaylooAPIV1
{
    // the following var is only for testing
    public array $coordinates = [
            [14.74409268292969, -17.511240627384424],
            [14.759140732474842, -17.476830055125106],
            [14.756348389562515, -17.439371460151907],
            [14.76115740244358, -17.426136623663815],
            [14.735249529604939, -17.422928178698232],
            [14.703830161013983, -17.433195202572662],
            [14.69723539822095, -17.461830573890502],
        ];

    public function getToken(): string
    {
        $response = Http::withBasicAuth(
            config('services.kayloo_api.access_key'),
            config('services.kayloo_api.secret_key')
        )
            ->post(config('services.kayloo_api.token_url'));

        return $response->status() === 200 ? $response->body() : '';
    }

    /**
     * Get all properties
     *
     * @return array|Collection
     */
    public function getAllProperties(): array|Collection
    {
        $token = $this->getToken();
        if (empty($token)) {
            return [];
        }

        $properties = Http::withToken($token)->get(config('services.kayloo_api.properties_url'));
        /*return collect(json_decode($properties->body()))
            ->filter(fn ($prop) => $prop->id === '1edaea65-4d40-6b2e-bbee-53cd541c9a29');*/
        return collect(json_decode($properties->body()));
    }

    /**
     * Get images from path
     *
     * @param $id
     * @return array|Collection
     */
    public function getImagesPath($id)
    {
        $token = $this->getToken();
        if (empty($token)) {
            return [];
        }

        $properties = Http::withToken($token)->get(config('services.kayloo_api.properties_images_path').'/'.$id);

        return collect(json_decode($properties->body()));
    }

    /**
     * Get image base64
     *
     * @param $id
     * @return array|Collection
     */
    public function getImagesBase64($id)
    {
        $token = $this->getToken();

        if (empty($token)) {
            return [];
        }

        $properties = Http::withToken($token)->get(config('services.kayloo_api.properties_images_base64').'/'.$id);
        return collect(json_decode($properties->body()));
    }

    /**
     * Use the API response and pass it through to be remapped to our DB structure
     *
     * @return int nbr affected lines
     */
    public function mapAPIToDB(): int
    {
        \Illuminate\Support\Facades\DB::disconnect();
        // for safety lets clean the propert types
        /*Schema::disableForeignKeyConstraints();
        PropertyType::truncate();
        Schema::enableForeignKeyConstraints();*/
        $this->cleanUpDB();

        /*// When moving image from cloud to the website host
        // we need to remove the db records
        // this done once
        $this->removePropertiesImages();*/

        return $this->getAllProperties()
            ->map(fn ($reponse) => $this->remapReponse($reponse))
            ->count();
    }

    /**
     * receive a line of the API response and remap it to match ou DB column and save it db
     *
     * @param $response
     * @return void
     */
    private function remapReponse($response): void
    {
        if (isset($response->id)) {
            $property = Property::where('name', $response->label)->first() ?? new Property();

            $city = City::firstOrCreate([
                'name' => $response->city ?? 'Dakar',
                'country_id' => Country::where('name', 'Sénégal')->first()->id
            ]);

            $localisation = $response->zone
            ? Localisation::firstOrCreate(
                [
                'name' => $response->zone
                ],
                [
                'city_id' => $city->id
                ]
            )
            : null;

            $property->ref = $response->id;
            $property->api_owner = $response->ownerId;
            $property->api_code = $response->code;
            $property->name = $response->label ?? '---';
            $property->description = $response->description;
            $property->property_type_id = $this->savePropertyType($response->type);
            $property->total_surfaces = $response->surface;
            $property->city_id = $city->id;
            $property->localisation_id = $localisation?->id;
            $property->acquisition_type = Acquisition::RENTING;
            /*$property->id = $response->street;*/
            $property->stage = "$response->level - $response->position";
            $property->property_state = $response->status == 'FREE' ? 1 : 0;
            $property->furnished = $response->furnished ? 2 : 1;
            $property->base_price = $response->basePrice;
            $property->montant_syndic = $response->syndicAmount;
            $property->vta_rate = $response->tvaRate;
            $property->tom_tax_rate = $response->tomRate;
            $property->tlv_tax_rate = $response->tlvRate;
            $property->generate_total_cost = $response->finalPrice;
            $property->commission_rate = $response->rentalCommissionRate;
            $property->deposit_percentage = $response->rentalDepositRate;
            $property->additional_charges = $response->mgmtRate;
            $property->nbr_rooms = $response->pieceCount;
            $property->nbr_bedrooms = $response->roomCount;
            $property->nbr_bathrooms = $response->bathroomCount;
            $property->nbr_kitchens = $response->kitchenCount;
            $property->nbr_lounge_rooms = $response->loungeCount;
            $property->savedFromSite = 2;


            if ($property->save()) {
                $coord = $this->coordinates[rand(0, 6)];
                // We save coordinates if available
                if ($response->lat > 0 && $response->lng > 0) {
                    Pin::UpdateOrCreate(
                        [
                            'pinnable_id' => $property->id,
                            'pinnable_type' => $property->getMorphClass()
                        ],
                        [
                            'latitude' => $response->lat,
                            'longitude' => $response->lng
                        ]
                    );
                }

                // we now need to sync the commodities
                if (! empty($response->commodities)) {
                    $commodities = collect($response->commodities)
                        ->map(fn ($c) => Commodity::firstOrCreate(
                            ['si_naming' => $c],
                            ['name' => ucfirst($c)]
                        ))->unique()->pluck('id');

                    $property->commodities()->sync($commodities);
                }

                $kaylooImg = $this->getImagesPath($response->id);
                if (! $kaylooImg->isEmpty()) {
                    // - filter/map image in local not in api
                    $imgToDelete = $property->images->whereNotIn('url', $kaylooImg->toArray());
                    // delete images in local not in api
                    if (! $imgToDelete->isEmpty()) {
                        $imgToDelete->each(fn ($img) => $img->delete());
                    }

                    // save image from API if is set
                    $kaylooImg
                        ->each(function ($img) use ($property) {
                            // We call the utility that will download the images from the kaylooAPI's response
                            $downloadKaylooImg = new DownloadKaylooImg($img);
                            $filename = $downloadKaylooImg();

                            // If we find the url
                            if ($image = Image::where('url', $filename)->first() ?? new Image()) {
                                $image->url = $filename;
                                $image->imageable_id = $property->id;
                                $image->imageable_type = 'App\Models\Property';

                                if (!$errorSaving = $image->save()) {
                                    echo [false, "Error while saving images <br> $errorSaving"];
                                }
                            }
                        });
                }
            }
        }
    }

    private function savePropertyType($type)
    {
        $t = match ($type) {
            'VILLA' => 'Villas',
            'OFFICE' => 'Plateaux de bureau',
            'MANGASIN' => 'Magasins',
            default => $type
        };

        return PropertyType::firstOrCreate(['name' => $t])->id;
    }

    /**
     * Loop and delete props not in kayloo props base on the props label
     * @return void
     */
    private function cleanUpDB(): void
    {
        // TODO: update this when buy is available
        // Get all kayloo props
        $kaylooProps = $this->getAllProperties();

        // Get all props not in Kayloo
        $toDelete = Property:: where('savedFromSite', 2)
            ->whereNotIn('name', $kaylooProps->pluck('label')->toArray())
            ->get();

        $toDelete->each(fn ($prop) => $prop->delete());
    }

    private function removePropertiesImages()
    {
        return Image::where('imageable_type', 'App\Models\Property')
            ->get()
            ->map(fn ($image) => $image->delete());
    }
}
