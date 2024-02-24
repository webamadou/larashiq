<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\CustomHelpers;
use App\Models\Availability;
use App\Models\Category;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use App\Traits\HasPropertySwithcher;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfProperties extends LivewireDatatable
{
    use CustomHelpers;
    use HasPropertySwithcher;

    public $model = Property::class;
    public $exportable = true;

    public function builder()
    {
        return Property::with('cities', 'countries');
    }

    public function columns(): array
    {
        return [
            /*NumberColumn::name('id')
                ->sortBy('id')
                ->searchable()
                ->label('Id'),*/

            NumberColumn::callback('acquisition_type', fn ($type) => __("front.acquisition$type"))
                ->sortBy('acquisition_type')
                ->searchable()
                ->label('-'),

            Column::callback('id', fn ($id) => $this->propertyImage($id))
                ->searchable(false)
                ->label('Image'),

            Column::callback('name', fn ($name) => $name)
                ->searchable()
                ->label('Titre')
                ->sortBy('properties.name'),

            Column::callback(
                'generate_total_cost',
                fn ($price) => "<p style='text-align: right'>".$this->moneyFormat($price)."</p>"
            )
                ->filterable()
                ->label(__('Prix')),

            Column::callback(['pin.longitude', 'pin.latitude'], fn ($lat, $lng) => !empty($lat) ? "$lat, $lng":"")
                ->searchable(false)
                ->label('Coordonees'),

            Column::callback(['country.name', 'city.name'], fn ($country, $city) => "<b>$city</b> - $country")
                ->filterable($this->cities->pluck('name'))
                ->searchable()
                ->label('Adresse'),

            Column::name('propertyType.name')
                ->filterable(PropertyType::pluck('name'))
                ->label(__('properties.property_type')),

            Column::callback(['id', 'highlighted'], fn($id, $vogue)
                => $this->swithcher('highlighted', $id))
                ->sortBy('properties.highlighted')
                ->label(__('properties.highlighted')),

            Column::callback('category.name', fn ($category)
                => $category)
                ->filterable($this->categories->pluck('name'))
                ->label(__('properties.category')),

            /*Column::callback('availability.name', fn ($availability)
                => $availability)
                ->filterable($this->availabilities->pluck('name'))
                ->label(__('properties.availability')),*/

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.properties.edit', $id);
                $showLink = route('bo.properties.show', $id);
                $deleteLink = route('bo.properties.destroy', $id);
                $customLinks['imagesLink'] = [
                    '<span class="fa fa-image"></span>', route('bo.property_images.create', $id)
                ];
                $deleteMessage = "Veuillez confirmer la suppression du bien {$name}";

                return view(
                    'layouts.partial.datatable-actions.table-actions',
                    compact(
                        'id',
                        'name',
                        'deleteMessage',
                        'editLink',
                        'showLink',
                        'customLinks',
                        'deleteLink'
                    )
                );
            })
                ->unsortable()
                ->label('Actions')
                ->excludeFromExport()
        ];
    }

    public function getCitiesProperty()
    {
        return City::all();
    }

    public function getAvailabilitiesProperty()
    {
        return Availability::all();
    }

    public function getCategoriesProperty()
    {
        return Category::all();
    }

    private function propertyImage($id)
    {
        $property =  Property::find($id);
        $image = $property
            ? '<img class="h-auto ml-5 my-0" width="60"  src="'.$property->getDefaultImage('thumbnail').'">' : '';
        return "{$image}";
    }
}
