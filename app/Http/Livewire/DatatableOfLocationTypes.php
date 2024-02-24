<?php

namespace App\Http\Livewire;

use App\Models\LocationType;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfLocationTypes extends LivewireDatatable
{
    public $model = LocationType::class;
    public $exportable = true;

    public function builder()
    {
        return LocationType::query();
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
                ->label('Nom')
                ->sortBy('name'),

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.location_types.edit', $id);
                $deleteLink = route('bo.location_types.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression du type {$name}";

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
}
