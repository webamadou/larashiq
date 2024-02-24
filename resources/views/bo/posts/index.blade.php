@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('Liste des articles')}}
    <x-audit-link model-name="Post" />
@endsection
@section('content')
<div class="flex space-x-2 justify-center">
    <a href="{{route('bo.posts.create')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight">
        <i class="fa fa-user-plus"></i> Ajouter un article
    </a>
</div>
<div class="w-full px-6 py-4" x-data="confirmationModal()">
    <livewire:datatable-of-posts />
</div>
@endsection
