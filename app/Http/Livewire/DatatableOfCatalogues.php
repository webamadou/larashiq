<?php

namespace App\Http\Livewire;

use App\Models\Catalogue;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfCatalogues extends LivewireDatatable
{
    public $model = Service::class;
    public $exportable = true;

    public function builder()
    {
        return Catalogue::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->sortBy('id')
                ->searchable()
                ->label('Id'),

            Column::callback('id', fn ($id) => $this->getImage($id))
                ->searchable()
                ->label('Image')
                ->sortBy('name'),

            Column::callback('pdf_file_url', fn ($url) => "<a href='{$url}' target='_blank'>{$url}</a>")
                ->searchable()
                ->label('Url du fichier pdf'),

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.catalogues.edit', $id);
                $deleteLink = route('bo.catalogues.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression de la catalogue {$name}";

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

    private function getImage($id)
    {
        $catalogue =  Catalogue::find($id);
        $image = $catalogue
            ? '<img class="h-auto ml-5 my-0" width="60"  src="'.asset($catalogue?->images->first()?->medium).'">' : '';
        return "{$image}<br>{$catalogue->name}";
    }
}
