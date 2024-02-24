<?php

namespace App\Http\Livewire;

use App\Models\Alert;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DatatableOfAlerts extends LivewireDatatable
{
    public $model = Alert::class;
    public $exportable = true;
    public $perPage = 50;

    public function builder(): Builder
    {
        return Alert::with(['property_types', 'localisation'])->where('active', '>', 0);
    }

    public function columns(): array
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
                ['user.first_name','user.name', 'user.email'],
                fn ($firstName, $name, $email) => "$firstName $name <br><b>$email</b>"
            )
                ->filterable(User::whereHas(
                    'alerts',
                    fn (Builder $query) => $query->where('active', '>', 0)
                )
                ->pluck('email'))
                ->searchable()
                ->label(__('alerts.th_user_infos')),

            Column::callback('acquisition', fn ($acq) => trans_choice('alerts.acquisitions', $acq))
                /*->filterable([
                    trans_choice('alerts.acquisitions', Property::ACQUISITION_BUY),
                    trans_choice('alerts.acquisitions', Property::ACQUISITION_RENT)
                ])*/
                ->label(__('alerts.th_acquisition')),

            Column::name('propertyTypes.name')
                ->filterable(PropertyType::pluck('name'))
                ->label('Type de biens'),

            /*Column::callback(
                ['budget_range', 'rooms_range','surface_range', 'bed_room_range'],
                function ($budget_range, $rooms_range, $surface_range, $bed_room_range) {
                    $displays = '';
                    if (! empty($budget = json_decode($budget_range))) {
                        $displays .= '<p class="mb-2.5"><b>Budget: </b> '.$budget->min . ' FCFA- ' .$budget->max.'FCFA <hr></p>' ;
                    }
                    if (! empty($surface = json_decode($surface_range))) {
                        $displays .= '<p class="mb-2.5"><b>Surface: </b> '.$surface->min . 'm<sup>2</sup> - '
                            .$surface->max.'m<sup>2</sup></p> <hr>' ;
                    }
                    if (! empty($rooms_range = json_decode($rooms_range))) {
                        $displays .= '<p class="mb-2.5"><b>Nbr Pieces: </b> '.$rooms_range->min . ' - '
                            .$rooms_range->max
                            .'</p> <hr>' ;
                    }
                    if (! empty($bed_room_range = json_decode($bed_room_range))) {
                        $displays .= '<p class="mb-2.5"><b>Nbr chambre: </b> '.$bed_room_range->min . ' - '
                            .$bed_room_range->max
                            .'</p> <hr>' ;
                    }

                    return $displays;
                }
            )->label('Details'),*/

            Column::name('nbr_sent')
                ->label(__('alerts.th_nbr_sent')),

            DateColumn::name('created_at')
                ->filterable()
                ->label(__('alerts.th_created_at'))
                ->sortBy('created_at'),

            Column::callback(['id'], function ($id) {
                $alert = Alert::find($id);
                return view(
                    'layouts.partial.datatable-actions.alert-modal-actions',
                    compact(
                        'id',
                        'alert'
                    )
                );
            })
            ];
    }
}
