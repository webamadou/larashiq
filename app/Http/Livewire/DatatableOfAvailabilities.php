<?php

namespace App\Http\Livewire;

use App\Models\Availability;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfAvailabilities extends LivewireDatatable
{
    public $model = Availability::class;
    public $exportable = false;

    public function builder()
    {
        return Availability::with('properties');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->sortBy('id')
                ->searchable()
                ->label('Id'),

            Column::name('name')
                ->label('name'),

            Column::callback(['icon', 'color'], fn ($icon, $color) => "<i class='fa {$icon} {$color}'></i>")
                ->label(__('Couleur et icon')),

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.availabilities.edit', $id);
                $deleteLink = route('bo.availabilities.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression de {$name}";

                return view(
                    'layouts.partial.datatable-actions.table-actions',
                    compact(
                        'id',
                        'name',
                        'editLink',
                        'deleteLink',
                        'deleteMessage'
                    )
                );
            })
                ->unsortable()
                ->label('Actions')
                ->excludeFromExport()
        ];
    }
}
