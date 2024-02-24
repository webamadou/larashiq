<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfCities extends LivewireDatatable
{
    public $model = City::class;
    public $exportable = true;

    public function builder()
    {
        return City::with('countries');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->sortBy('id')
                ->searchable()
                ->label('Id'),

            Column::name('name')
                ->searchable()
                ->label('Nom de la ville')
                ->sortBy('name'),

            Column::callback('country_id', fn ($country)  => Country::find($country)->name ?? '')
                ->label('Pays'),

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.cities.edit', $id);
                $deleteLink = route('bo.cities.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression de la ville {$name}";

                return view(
                    'layouts.partial.datatable-actions.table-actions',
                    compact(
                        'id',
                        'name',
                        'deleteMessage',
                        'editLink',
                        'deleteLink'
                    )
                );
            })
                ->unsortable()
                ->label('Actions')
                ->excludeFromExport()
        ];
    }

    public function getCoutriesProperty()
    {
        return Country::all();
    }
}
