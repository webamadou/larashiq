<?php

namespace App\Http\Livewire;

use App\Models\Agency;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfAgency extends LivewireDatatable
{
    public $model = Agency::class;
    public $exportable = true;

    public function builder()
    {
        return Agency::query();
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
                ->label('Nom de l\'agence')
                ->sortBy('name'),

            Column::name('email')
                ->searchable()
                ->label('Email')
                ->sortBy('email'),

            Column::name('phone_number')
                ->searchable()
                ->label('Telephone & Adresse')
                ->sortBy('phone_number')
                ->sortBy('address'),

            Column::callback(['id', 'name'], function ($id, $name) {
                $editLink = route('bo.agencies.edit', $id);
                $deleteLink = route('bo.agencies.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression de l\'agence {$name}";

                return view(
                    'layouts.partial.datatable-actions.table-actions',
                    compact(
                        'id',
                        'name',
                        'deleteLink',
                        'deleteMessage',
                        'editLink'
                    )
                );
            })
                ->unsortable()
                ->label('Actions')
                ->excludeFromExport()
        ];
    }
}
