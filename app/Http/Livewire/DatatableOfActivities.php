<?php

namespace App\Http\Livewire;

use App\Models\Property;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;

class DatatableOfActivities extends LivewireDatatable
{
    public string $className = Property::class;

    public function builder()
    {
        return Activity::where('subject_type', $this->className);
    }

    public function columns()
    {
        return [
            DateColumn::name('updated_at')
                ->filterable()
                ->label(__('activities.updated_at'))
                ->format('d-m-Y H:i:s')
                ->defaultSort('desc')
                ->sortBy('updated_at'),

            Column::callback('causer.name', fn ($causer) => $causer)
                ->sortBy('causer_id')
                ->searchable()
                ->label(__('activities.actor')),

            Column::callback('event', fn ($event) => $event)
                ->searchable()
                ->filterable()
                ->label(__('activities.action'))
                ->sortBy('event'),

            Column::name('subject_id')
                ->searchable()
                ->label(__('activities.item_id'))
                ->sortBy('subject_id'),

            Column::callback('properties', fn ($properties) => json_decode($properties)?->attributes?->name ?? '')
                ->searchable()
                ->label(__('activities.item_name')),

            Column::callback(['subject_type', 'subject_id', 'id'], function ($subject_type, $subject_id, $id) {
                $subjectType = explode('\\', $subject_type);
                $subjectType = end($subjectType);
                $showLink = route('bo.activities.show', [$subjectType, $subject_id, $id]);
                /*$customLinks['showAudit'] = [
                    '<span class="fa fa-eye"></span>', route('bo.property_images.create', $id)
                ];*/

                return view(
                    'layouts.partial.datatable-actions.table-actions',
                    compact(
                        'id',
                        'showLink',
                    )
                );
            })
                ->unsortable()
                ->label('Actions')
                ->excludeFromExport()
        ];
    }
}
