<?php

namespace App\Http\Livewire\Traits;

use App\Models\Pin;

trait HasMap
{
    public $items = null;
    public string      $mapStyle = 'https://api.maptiler.com/maps/45785f68-8999-40e7-903d-9f0dbb0cda28/style.json';
    public string      $container = 'map';
    public array       $mapCenter = [Pin::LONG, Pin::LAT];
    public array       $geoJson = [];
    public int         $mapZoom = 19;
    public string      $markerURL = 'https://immoplussablux.com/images/favicons/favicon-16x16.png';
    public bool        $isSingle = false;

    public function mountHasMap()
    {
        $this->buildGeoJson();
    }

    private function buildGeoJson()
    {
        $this->geoJson = (!$this->items) ? []
            : [
            'type' => 'FeatureCollection',
            'features' => $this->buildMarkersData()
            ];
        // if geojson is not empty, we set the center of the map to the first element with coordinates
        if (! empty($this->geoJson)) {
            $this->mapCenter = $this->recenterMap();
                // [$pin->longitude, $pin->latitude];
        }
    }

    private function buildMarkersData(): ?array
    {
        if (! $this->isSingle) {
            return $this->items
                ?->map(fn ($prop) =>
                [
                    'type' => 'Feature',
                    'properties' => [
                        'message' => $prop->name
                    ],
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [$prop->pin->longitude ?? '', $prop->pin->latitude ?? '']
                    ]
                ])->toArray();
        } elseif ($this->isSingle) {// dd($this->items, $this->items?->pin->longitude);
            return [
                [
                    'type' => 'Feature',
                    'properties' => [
                        'message' => $this->items?->name
                    ],
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [$this->items?->pin->longitude ?? '', $this->items?->pin->latitude ?? '']
                    ]
                ]
            ];
        }

        return [];
    }

    private function recenterMap()
    {
        if (! $this->isSingle) {
            if (method_exists($this->items, 'filter')) {
                $pin = $this->items->filter(fn($item) => $item?->pin?->latitude)->first()?->pin;
                return [$pin->longitude ?? Pin::LONG, $pin->latitude ?? Pin::LAT];
            }

            return [Pin::LONG, Pin::LAT];
        }

        $lat = $this->items?->pin->latitude ?? Pin::LAT;
        $long = $this->items?->pin->longitude ?? Pin::LONG;

        return [$long, $lat];
    }
}
