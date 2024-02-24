<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfPage extends LivewireDatatable
{
    public $model = Page::class;
    public $exportable = true;

    public function builder()
    {
        return Page::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->sortBy('id')
                ->searchable()
                ->label('Id'),

            Column::name('name')
                ->sortBy('name')
                ->searchable()
                ->label('Titre'),

            /*Column::callback('id', fn ($id) => $this->pageImage($id))
                ->searchable()
                ->label('Image')
                ->sortBy('name'),*/

            DateColumn::name('created_at')
                ->filterable()
                ->label('Enregistrer le')
                ->sortBy('created_at'),

            Column::callback(['id', 'name', 'slug'], function ($id, $name, $slug) {
                $showLink = route('see-page', $slug);
                $editLink = route('bo.pages.edit', $id);
                $deleteLink = route('bo.pages.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression de la page {$name}";

                return view(
                    'layouts.partial.datatable-actions.table-actions',
                    compact(
                        'id',
                        'name',
                        'showLink',
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

    private function pageImage($id)
    {
        $page =  Page::find($id);
        $image = $page->image
            ? '<img class="h-auto ml-5 my-0" width="60"  src="'.asset($page->getDefaultImage()).'">' : '';
        return "{$image}<br>{$page->name}";
    }
}
