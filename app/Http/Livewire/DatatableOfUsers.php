<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfUsers extends LivewireDatatable
{
    public $model = User::class;
    public $hideable = 'select';
    public $exportable = true;
    public $perPage = 25;

    public function builder()
    {
        return User::with('roles');
        // return User::query()->leftJoin('planets', 'planets.id', 'users.planet_id');
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

            Column::name('email')
                ->searchable()
                ->label('Email')
                ->sortBy('email'),

            Column::name('roles.name')
                ->filterable($this->roles->pluck('name'))
                ->label('Roles'),

            DateColumn::name('created_at')
                ->filterable()
                ->label('Enregistrer le')
                ->sortBy('created_at'),

            Column::callback(['id', 'name', 'first_name'], function ($id, $name, $first_name) {
                $showLink = route('bo.users.show', $id);
                $editLink = route('bo.users.edit', $id);
                $deleteLink = route('bo.users.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression du profil {$first_name} {$name}";

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

    public function getRolesProperty()
    {
        return Role::all();
    }
}
