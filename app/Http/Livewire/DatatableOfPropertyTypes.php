<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Builder;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfPropertyTypes extends LivewireDatatable
{
    public $model = PropertyType::class;
    public $exportable = true;

    public function builder(): Builder
    {
        return PropertyType::query();
    }

    public function columns(): array
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
                $editLink = route('bo.property_types.edit', $id);
                $deleteLink = route('bo.property_types.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression du types de propriété {$name}";

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
