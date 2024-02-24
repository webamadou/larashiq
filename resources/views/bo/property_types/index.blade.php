@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('Liste des types de biens')}}
    <x-audit-link model-name="Propertytype" />
@endsection

@section('content')
<div class="flex space-x-2 justify-center">
    <a href="{{route('bo.property_types.create')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none
       shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none
       focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
        <i class="fa fa-user-plus"></i> Ajouter un type de bien
    </a>
</div>
<div class="w-full px-6 py-4" x-data="confirmationModal()">
    <livewire:datatable-of-property-types />
</div>
@endsection
