@extends('layouts.tw_admin_v2')

@section('page-title')
    Modification de la localisation {{$localisation->name}}
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.localisations.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste</a>
    <div class="w-6/12 mx-auto bg-immogray1 py-2.5 px-8">
        {{ Aire::open()->route('bo.localisations.update', $localisation)}}
            @include('bo.localisations.air_form')
        {{ Aire::close() }}
    </div>
</div>

@endsection
