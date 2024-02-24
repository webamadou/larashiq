<?php

namespace App\Http\Livewire;

use App\Models\Meta;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfMetas extends LivewireDatatable
{
    public function builder()
    {
        return Meta::query();
    }

    public function columns()
    {
        return [
            Column::name('title')
                ->searchable()
                ->label('Title')
                ->sortBy('title'),

            Column::callback('url', fn ($url) => "<a href='{$url}' target='_blank'>{$url}</a>")
                ->searchable()
                ->label('URL')
                ->sortBy('url'),

            Column::callback(['keywords'], fn ($keywords) =>  $keywords)
                ->searchable()
                ->label('Meta tags'),

            Column::callback(['id', 'title'], function ($id, $title) {
                $editLink = route('bo.metas.edit', $id);
                $deleteLink = route('bo.metas.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression du meta {$title}";

                return view(
                    'layouts.partial.datatable-actions.table-actions',
                    compact(
                        'id',
                        'title',
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
