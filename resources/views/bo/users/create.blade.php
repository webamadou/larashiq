@extends('layouts.admin_v3')

@section('page-title')
    {{__('Ajouter un profile')}}
@endsection
@section('content')
<h2 class="ml-6">Remplissez le formulaire pour créer un nouveau compte.</h2>
<x-form-error />
<section classz="w-full h-full mb-5">
    @if(session()->has('errors'))
        <div class="alert bg-red-100 py-1 px-6 mb-3 text-base text-red-700 inline-flex items-center
            w-full alert-dismissible fade show border-r" role="alert">
            <strong class="mr-1">{{ session()->get('errors') }}</strong>
        </div>
    @endif
    <div class="w-75 px-8 py-4">
        <p>
            <a href="{{route('bo.users.index')}}" class="btn btn-gradient-primary p-2">
                <i class="mdi mdi-chevron-double-left"></i> Revenir à la liste
            </a>
        </p>

        <div class="w-75 justify-content-center d-flex m-auto py-2.5 px-8 my-6 bo-form">
        <div class="w-6/12 mx-auto bg-immogray1 py-2.5 px-8 my-6">
            {{ Aire::open()->route('bo.users.store')}}
                @include('bo.users.air_form')
            {{ Aire::close() }}
        </div>
    </div>
</section>
@endsection
