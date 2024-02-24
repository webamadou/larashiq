<?php

namespace App\Http\Livewire;

use App\Models\Pole;
use App\Models\Service;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfServices extends LivewireDatatable
{
    public $model = Service::class;
    public $exportable = true;

    public function builder()
    {
        return Service::with('poles');
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

            Column::callback('pole_id', fn ($pole)  => Pole::find($pole)->name ?? '')
                ->label('Pôle'),

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.services.edit', $id);
                $deleteLink = route('bo.services.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression du service {$name}";

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
