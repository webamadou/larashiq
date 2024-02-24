<?php

namespace App\Utilities;

use App\Jobs\AlertProperties;
use App\Models\Alert;
use App\Models\Property;
use \Illuminate\Support\Collection;

class AlertManager
{
    public function __construct(public $freq = Alert::FREQ_MONTHLY)
    {
    }

    public function sendAlert()
    {
        if (! isset(Alert::getFrequencies()[$this->freq])) {
            return;
        }

        foreach ($this->getAlertByFrequency() as $key => $alert) {
            $properties = $this->getMatchingProperties($alert);
            if ($properties->count() > 0) {
                // (new AlertProperties($properties, $alert))->dispatch($properties, $alert);
                (new AlertProperties($properties, $alert))->handle();
            }
            // $properties->each(fn ($prop) => (new AlertProperties($prop, $alert))->dispatch($prop, $alert));
        }
    }

    private function getAlertByFrequency()
    {
        return Alert::where('frequency', $this->freq)
            ->orderBy('created_at')
            ->get();
    }

    /**
     * This method will search for properties that match the requests in an alert
     *
     * @param Alert $alert
     * @return Collection
     */
    private function getMatchingProperties(Alert $alert): Collection
    {
        // We only need active alerts
        if ($alert->active != 1) {
            return collect([]);
        }
        $propertyTypes = $alert->propertyTypes->pluck('id')->toArray();
        $properties = Property::where('acquisition_type', $alert->acquisition)
            ->whereIn('property_type_id', $propertyTypes);

        if (! empty($alert->budget_range)) {
            $budget = json_decode($alert->budget_range);
            $properties->whereBetween('generate_total_cost', [$budget->min, $budget->max]);
        }
        if (! empty($alert->localisation_id)) {
            $properties->where('localisation_id', $alert->localisation_id);
        }
        $rooms = json_decode($alert->rooms_range);
        if ($rooms?->min > 0) {
            $properties->where('nbr_rooms', '>=', $rooms?->min);
        }
        if ($rooms?->max > $rooms?->min) {
            $properties->where('nbr_rooms', '<=', $rooms?->max);
        }

        $surfaces = json_decode($alert->surface_range);
        if ($surfaces?->min > 0) {
            $properties->where('total_surfaces', '>=', $surfaces?->min);
        }
        if ($surfaces?->max > $surfaces?->min) {
            $properties->where('total_surfaces', '<=', $surfaces?->max);
        }

        $bedRooms = json_decode($alert->bed_room_range);
        if ($bedRooms?->min > 0) {
            $properties->where('nbr_bedrooms', '>=', $bedRooms?->min);
        }
        if ($bedRooms?->max > $bedRooms?->min) {
            $properties->where('nbr_bedrooms', '<=', $bedRooms?->max);
        }

        $floorRange = json_decode($alert->floor_range);
        if ($floorRange?->min > 0) {
            $properties->where('stage', '>=', $floorRange?->min);
        }
        if ($floorRange?->max > $floorRange?->min) {
            $properties->where('stage', '<=', $floorRange?->max);
        }

        $commodities = json_decode($alert->commodities);
        if (! empty($commodities)) {
            return $properties
                ->get()
                ->filter(fn ($prop) => $prop->commodities->whereIn('id', $commodities));
        }

        return $properties->get();
    }
}
