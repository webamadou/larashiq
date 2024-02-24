<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use Illuminate\Database\Eloquent\Builder;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfCommodities extends LivewireDatatable
{
    public $model = Commodity::class;
    public $exportable = true;

    public function builder(): Builder
    {
        return Commodity::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->sortBy('id')
                ->searchable()
                ->label('id'),

            Column::name('name')
                ->searchable()
                ->label('Nom')
                ->sortBy('name'),

            Column::callback(['icon_classes'], fn ($icon) => '<h1><span class="'.strtolower($icon).'"></span></h1>')
                ->label('Icone'),

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.commodities.edit', $id);
                $deleteLink = route('bo.commodities.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression de la commodité {$name}";

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
