<?php

namespace App\View\Components;

use App\Models\Pin;
use Hamcrest\Core\JavaForm;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Maptailer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $items = null,
        public string      $mapStyle = 'https://api.maptiler.com/maps/45785f68-8999-40e7-903d-9f0dbb0cda28/style.json',
        public string      $container = 'map',
        public array       $mapCenter = [Pin::LONG, Pin::LAT],
        public array       $geoJson = [],
        public int         $mapZoom = 19,
        public string      $markerURL = 'https://immoplussablux.com/images/favicons/favicon-32x32.png',
        public bool        $isSingle = false,
    ) {
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
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.maptailer');
    }

    private function buildMarkersData(): ?array
    {
        if (! $this->isSingle) {
            return $this->items
                ?->map(fn ($prop) =>
                [
                    'type' => 'Feature',
                    'properties' => [
                        'name' => $prop->name,
                        'slug' => $prop->slug ?? '',
                        'url' => route('show-property', $prop->slug ?? ''),
                        'popup' => $this->renderPropertyDetailsPartial($prop),
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
                        'name' => $this->items?->name,
                        'slug' => $this->items?->slug ?? '',
                        'url' => route('show-property', $this->items?->slug ?? ''),
                        'popup' => $this->renderPropertyDetailsPartial($this->items),
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

    private function renderPropertyDetailsPartial($property)
    {
        return View::make('partials.property-details', ['property' => $property])->render();
    }
}
