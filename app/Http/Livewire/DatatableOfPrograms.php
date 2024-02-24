<?php

namespace App\Http\Livewire;

use App\Models\Program;
use App\Models\Property;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfPrograms extends LivewireDatatable
{
    public $model = Program::class;
    public $exportable = true;
    public $perPage = 50;

    public function builder()
    {
        return Program::with(['property']);
    }

    public function columns()
    {
        return
            [
                Column::name('id')
                    ->sortBy('id')
                    ->defaultSort('desc')
                    ->hide(),

                Column::name('name')
                    ->sortBy('name')
                    ->searchable()
                    ->label('Nom'),

                Column::name('property_id')
                    ->sortBy('name')
                    ->searchable()
                    ->label('test'),

                Column::callback(
                    ['property.name', 'property.slug'],
                    fn ($name, $slug) => '<a href="'.route('bo.programs.show', $slug).'">Le bien'.$name.'</a>'
                )
                    ->label('Bien'),

                Column::callback(['id', 'name'], function ($id, $name) {
                    $editLink = route('bo.programs.edit', $id);
                    $deleteLink = route('bo.programs.destroy', $id);
                    $deleteMessage = "Veuillez confirmer la suppression du program {$name}";

                    return view(
                        'layouts.partial.datatable-actions.table-actions',
                        compact(
                            'id',
                            'name',
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
}
