@extends('layouts.email_app')

@section('content')
<div class="container">
    <h1 style="margin-bottom: 3rem;">{{__('estimations.admin_new_estimation_title')}}</h1>

    <table class="table-auto even:bg-gray-100 odd:bg-white"  width="100%" cellpadding="10" cellspacing="0">
        <tr><td><strong>Ref: </strong> Ref{{$estimation->ref}}</td></tr>
        <tr>
            <td>
                <strong>Estimation créée par</strong> {{$estimation?->user?->fullname}}<br>
                {{$estimation?->user?->email}} - {{$estimation?->user?->phone_number}}
            </td>
        </tr>
        @if (! empty($estimation->built_year))
            <tr><td><strong>Construit en: </strong> {{$estimation->built_year}}</td></tr>
        @endif
        @if (intval($estimation->nbr_rooms) > 0)
            <tr><td><strong>{{__('estimations.nbr_rooms_label')}}: </strong> {{$estimation->nbr_rooms}}</td></tr>
        @endif
        @if (intval($estimation->nbr_bed_rooms) > 0)
            <tr><td><strong>{{__('estimations.nbr_bed_rooms')}}: </strong> {{$estimation->nbr_bed_rooms}}</td></tr>
        @endif
        @if (intval($estimation->surface) > 0)
            <tr><td><strong>{{__('estimations.surface')}}: </strong> {{$estimation->surface}}m<sup>2</sup></td></tr>
        @endif
        @if (intval($estimation->living_room_surface) > 0)
            <tr><td><strong>{{__('estimations.living_room_surface')}}: </strong> {{$estimation->living_room_surface}}m<sup>2</sup></td></tr>
        @endif
        @if (intval($estimation->nbr_water_room) > 0)
            <tr><td><strong>{{__('estimations.nbr_water_room')}}: </strong> {{$estimation->nbr_water_room}}</td></tr>
        @endif
        @if (intval($estimation->nbr_bathroom) > 0)
            <tr><td><strong>{{__('estimations.nbr_bath_room')}}: </strong> {{$estimation->nbr_bathroom}}</td></tr>
        @endif
        @if (! empty($estimation->commodities))
            <tr>
                <td>
                    <strong>{{__('estimations.commodities_label')}}: </strong>
                    <ul>
                    @foreach($estimation->commodities()->get() as $commodity)
                        <li>{{@$commodity->name}}</li>
                    @endforeach
                    </ul>
                </td>
            </tr>
        @endif
        @if (intval($estimation->heating_system) > 0)
            <tr>
                <td>
                    <strong>{{__('estimations.heating_system_label')}}: </strong>
                    {{@$heatingSystems[$estimation->heating_system]}}
                </td>
            </tr>
        @endif
        @if (intval($estimation->general_condition) > 0)
            <tr><td>
                    <strong>{{__('estimations.general_condition_label')}}: </strong>
                    {{@$conditions[$estimation->general_condition]}}
                </td></tr>
        @endif
        @if (intval($estimation->kitchen_type) > 0)
            <tr>
                <td>
                    <strong>{{__('estimations.kitchen_type')}}: </strong>
                    {{@$kitchenTypes[$estimation->kitchen_type]}}
                </td>
            </tr>
        @endif
        @if (intval($estimation->nbr_parking) > 0)
            <tr><td><strong>{{__('estimations.nbr_parking_label')}}: </strong> {{$estimation->nbr_parking}}</td></tr>
        @endif
        @if (intval($estimation->description) > 0)
            <tr><td><strong>Description: </strong> {{$estimation->description}}</td></tr>
        @endif
    </table>
</div>
@endsection
