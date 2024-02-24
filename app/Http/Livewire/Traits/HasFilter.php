<?php

namespace App\Http\Livewire\Traits;

use App\Models\Localisation;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

trait HasFilter
{
    public $acquisition;
    public $localisationName;
    public $budgetMax;
    public $budgetMin;
    public $surfaceMax;
    public $surfaceMin;
    public $localisationId;
    public $orderColumn = 'created_at';
    public $orderDirection = 'asc';
    public $inputValue = '';
    public $query;
    public $properties;
    public $propertyTypes = [];
    public $propertyTypesList = [];
    public $propertyType = '';
    public $propertyTypeChild = '';
    public $hasChildren = false;
    public $parents = [];
    public $filterTitle = '';
    public string $baseUrl = '';

    protected array $queryStringHasFilter = [
        'orderColumn' => [],
        'orderDirection' => [],
        'localisationId' => ['as' => 'localisation'],
        'budgetMin' => [],
        'budgetMax' => [],
        'surfaceMin' => [],
        'surfaceMax' => [],
        'propertyType' => ['as' => 'property_type_id'],
        'propertyTypeChild' => ['as' => 'property_type_id_child'],
    ];

    public function mountHasFilter(Request | null $request): void
    {
        $this->propertyTypesList = PropertyType::isRoot()->pluck('name', 'id');
        if (! empty($this->localisationName)) {
            $this->localisationId = Localisation::getLocalisationByName($this->localisationName)?->id;
        }
        $this->inputValue = $this->localisationName;
        $this->updatePropertyTypes();
        $this->search($this->query);
        $this->baseUrl = \URL::current();
    }

    public function search(Collection | null $query): void
    {
        $result = $query ?? Property::where('acquisition_type', $this->acquisition);

        if (! empty($this->localisationId)) {
            $this->filtering = true;
            $result = $result->where('localisation_id', $this->localisationId);
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

        // New way of getting props by property type using a given id
        if (! empty($this->propertyType)) {
            $this->filtering = true;
            $propertyType = ! empty($this->propertyTypeChild) ? $this->propertyTypeChild : $this->propertyType;
            $result = $result->where('property_type_id', $propertyType);
        }

        $this->properties = $this->orderDirection == 'desc'
            ? $result->sortByDesc($this->orderColumn)
            : $result->sortBy($this->orderColumn);
    }

    public function resetFilter(): void
    {
        $this->reset([
            'localisationId',
            'budgetMin',
            'budgetMax',
            'surfaceMin',
            'surfaceMax',
            'propertyType',
            'propertyTypeChild',
            'filtering',
            'hasChildren',
        ]);

        $this->search($this->query);
    }

    /**
     * This is called on mount and when parent property type changed. It will help get the children of the selected
     * property type
     *
     * @return void
     */
    private function updatePropertyTypes(): void
    {
        $type = PropertyType::find($this->propertyType);

        if ($parentValue = $type?->parent()?->first()) {
            $this->hasChildren = true;
            $this->parentValue = $parentValue;
            $this->childValue = $type->id ;
            $this->children = PropertyType::find($parentValue)?->children()?->pluck('name', 'id')?->toArray();
        } elseif ($type?->children()?->first()) {
            $this->hasChildren = true;
            $this->parentValue = $type?->id;
            $this->children = PropertyType::find($this->parentValue)?->children()?->pluck('name', 'id')?->toArray();
        } else {
            $this->hasChildren = false;
            $this->parentValue = $type?->id;
            $this->children = [];
        }

        $this->parents = PropertyType::isRoot()->pluck('name', 'id')->toArray();
    }
}
