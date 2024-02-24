<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfCategories extends LivewireDatatable
{
    public $model = Category::class;
    public $exportable = true;

    public function builder()
    {
        return Category::query();
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
                $editLink = route('bo.categories.edit', $id);
                $deleteLink = route('bo.categories.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression de la catégorie {$name}";

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
