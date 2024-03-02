@extends('layouts.admin_v3')

@section('page-title')
    {{__('Ajouter un profile')}}
@endsection
@section('content')
<p class="ml-6">Remplissez le formulaire pour créer un nouveau compte.</p>
<x-form-error />
@if(session()->has('errors'))
    <div class="alert bg-red-100 py-1 px-6 mb-3 text-base text-red-700 inline-flex items-center
        w-full alert-dismissible fade show border-r" role="alert">
        <strong class="mr-1">{{ session()->get('errors') }}</strong>
        <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="w-full px-8 py-4">
    <p>
        <a href="{{route('bo.users.index')}}" class="btn btn-gradient-primary p-2">
            <i class="mdi mdi-chevron-double-left"></i> Revenir à la liste
        </a>
    </p>

    <div class="w-75 justify-content-center d-flex m-auto py-2.5 px-8 my-6 bo-form">
        {{ Aire::open()->route('bo.users.store')}}
            @include('bo.users.air_form')
        {{ Aire::close() }}
    </div>
</div>

@endsection
