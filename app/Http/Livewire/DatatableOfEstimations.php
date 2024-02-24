<?php
namespace App\Http\Livewire;

use App\Models\Estimation;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Support\Str;
use Matrix\Builder;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfEstimations extends LivewireDatatable
{
    public $model = Estimation::class;
    public $hideable = 'select';
    public $exportable = true;
    public $perPage = 25;

    public function builder()
    {
        return Estimation::with('users', 'commodities', 'propertyTypes');
    }

    public function columns()
    {
        return [
            Column::name('id')
                ->sortBy('id')
                ->defaultSort('desc')
                ->hide(),

            NumberColumn::callback('ref', fn ($ref) => Str::limit($ref, 8))
                ->searchable()
                ->label('Ref'),

            Column::callback(
                ['user.email', 'user.phone_number'],
                fn ($email, $phoneNumber) => "<b>$email</b><br>$phoneNumber"
            )
                ->filterable(User::whereHas('estimations')->pluck('email'))
                ->searchable()
                ->label(__('estimations.th_user_infos')),

            Column::name('propertyType.name')
                ->filterable(PropertyType::pluck('name'))
                ->label('Type de biens'),

            Column::callback(
                ['nbr_rooms', 'address'],
                fn ($rooms, $address) => "{$rooms} Pieces à {$address}"
            )
                ->searchable()
                ->label('Le bien'),

            Column::callback(
                ['status', 'id'],
                fn ($status, $id) => "<span class='estimation_status' data-id='$id'>".Estimation::statusDot($status).'
                 '.Estimation::getStatus()[$status] ."<span>"
            )
                ->searchable()
                ->label('Status'),

            Column::callback(
                ['surface', 'living_room_surface'],
                fn ($surface, $livingSurface) => "Surface:{$surface}<br> Surface du sejour: {$livingSurface}"
            )
                ->searchable()
                ->label('Les dimensions'),

            Column::callback(['id', 'ref'], function ($id, $ref) {
                $estimation = Estimation::find($id);
                $deleteLink = route('bo.estimations.destroy', $id);
                $deleteMessage = "Veuillez confirmer la suppression de l'estimation {$id} {$ref}";

                return view(
                    'layouts.partial.datatable-actions.estimation-modal-actions',
                    compact(
                        'id',
                        'estimation',
                        'deleteMessage',
                        'deleteLink',
                    )
                );
            })
        ];
    }
}
