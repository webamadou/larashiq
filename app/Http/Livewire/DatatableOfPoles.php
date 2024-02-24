<?php

namespace App\Http\Livewire;

use App\Models\Pole;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfPoles extends LivewireDatatable
{
    public $model = Pole::class;
    public $exportable = true;

    public function builder()
    {
        return Pole::with('parent');
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

            Column::callback('parent_id', fn ($pole)  => Pole::find($pole)->name ?? '')
                ->filterable()
                ->label('Parent'),

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.poles.edit', $id);
                $deleteLink = route('bo.poles.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression du pôle {$name}";

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
