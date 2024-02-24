<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Role;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfRoles extends LivewireDatatable
{
    public $model = Role::class;

    public function columns(): array
    {
        return [
            Column::name('id'),
            Column::callback('name', function ($role) {
                return view('datatables::link', [
                    'href' => 'backoffice/roles/'.Str::slug($role),
                    'slot' => ucfirst($role)
                ]);
            })
                ->label('Nom')
                ->sortBy('name')
                ->defaultSort('desc')
                ->searchable(),

            DateColumn::name('created_at')
                ->filterable()
                ->label('Ajouter le:')
        ];
    }
}
