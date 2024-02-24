<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Localisation;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfLocalisations extends LivewireDatatable
{
    public $model = Localisation::class;
    public $exportable = true;

    public function builder()
    {
        return Localisation::with('cities');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->searchable()
                ->label('Id'),

            Column::name('name')
                ->sortBy('name')
                ->searchable()
                ->label(__('localisations.th_title_names'))
                ->sortBy('name'),

            Column::name('city.name')
                ->filterable($this->cities->pluck('name'))
                ->label(__('localisations.th_title_cities')),

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.localisations.edit', $id);
                $deleteLink = route('bo.localisations.destroy', $id);
                $deleteMessage = __('localisations.confirm_deletion', ['name' => $name]);

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

    public function getCitiesProperty()
    {
        return City::all();
    }
}
