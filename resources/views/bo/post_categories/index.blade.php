@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__("Liste des catégories d'articles")}}
    <x-audit-link model-name="Postcategory" />
@endsection

@section('content')
<div class="flex space-x-2 justify-center">
    <a href="{{route('bo.post_categories.create')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-plus"></i> Ajouter une catégorie
    </a>
</div>
<div class="w-full px-6 py-4" x-data="confirmationModal()">
    <livewire:datatable-of-post-categories />
</div>
@endsection
