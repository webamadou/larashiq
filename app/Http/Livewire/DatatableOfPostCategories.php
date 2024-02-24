<?php

namespace App\Http\Livewire;

use App\Models\PostCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfPostCategories extends LivewireDatatable
{
    public $model = Category::class;
    public $exportable = true;

    public function builder()
    {
        return PostCategory::query();
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
                $editLink = route('bo.post_categories.edit', $id);
                $deleteLink = route('bo.post_categories.destroy', $id);
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
