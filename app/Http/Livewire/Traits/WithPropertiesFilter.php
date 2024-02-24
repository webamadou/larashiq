<?php

namespace App\Http\Livewire\Traits;

use App\Models\Property;

trait WithPropertiesFilter
{
    public function applyFilters()
    {
        $result = Property::query();

        if (! empty($this->acquisitionType)) {
            $result = $result->where('acquisition_type', $this->acquisitionType);
        }

        if (! empty($this->localisationId)) {
            $this->filtering = true;
            $result = $result->where('localisation_id', $this->localisationId);
        }

        if ($this->furnished > 0) {
            $this->filtering = true;
            $result = $result->where('furnished', $this->furnished);
        }

        if (! empty($this->budgetMax)) {
            $this->filtering = true;
            $value = preg_replace('/[^0-9]/', '', $this->budgetMax);
            $result = $result->where('generate_total_cost', '<=', $value);
        }

        if (! empty($this->budgetMin)) {
            $this->filtering = true;
            $value = preg_replace('/[^0-9]/', '', $this->budgetMin);
            $result = $result->where('generate_total_cost', '>=', $value);
        }

        if (! empty($this->surfaceMax)) {
            $this->filtering = true;
            $result = $result->where('total_surfaces', '<=', $this->surfaceMax);
        }

        if (! empty($this->surfaceMin)) {
            $this->filtering = true;
            $result = $result->where('total_surfaces', '>=', $this->surfaceMin);
        }

        if (! empty($this->propertyType)) {
            $this->filtering = true;
            $propertyType = ! empty($this->propertyTypeChild) ? $this->propertyTypeChild : $this->propertyType;
            $result = $result->where('property_type_id', $propertyType);
        }

        return $result->orderBy($this->orderColumn, $this->orderDirection);
    }

    public function resetFilter()
    {
        $this->reset([
            'localisationId',
            'budgetMin',
            'budgetMax',
            'surfaceMin',
            'surfaceMax',
            'propertyType',
            'propertyTypeChild',
            'furnished',
            'filtering',
            'hasChildren',
        ]);

        $this->applyFilters();
    }
}
