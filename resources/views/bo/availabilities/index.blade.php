@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('liste des types de disponibilités')}}
    <x-audit-link model-name="Availability" />
@endsection

@section('content')
<div class="flex space-x-2 justify-center">
    <a href="{{route('bo.availabilities.create')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-plus"></i> Ajouter une disponibilité
    </a>
</div>
<div class="w-full px-6 py-4" x-data="confirmationModal()">
    <livewire:datatable-of-availabilities />
</div>
@endsection
