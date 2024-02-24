@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('Liste des metas')}}
    <x-audit-link model-name="Meta" />
@endsection

@section('content')
<div class="flex space-x-2 justify-center">
    <a href="{{route('bo.metas.create')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase">
        <i class="fa fa-list-plus"></i> Ajouter un meta
    </a>
</div>
<div class="w-full px-6 py-4" x-data="confirmationModal()">
    <livewire:datatable-of-metas />
</div>
@endsection
