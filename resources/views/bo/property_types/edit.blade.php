@extends('layouts.tw_admin_v2')

@section('page-title')
    Modification du type de bien {{$propertyType->name}}
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.property_types.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none
       shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none
       focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste</a>
    <div class="w-6/12 mx-auto bg-immogray1 py-2.5 px-8">
        {{ Aire::open()->route('bo.property_types.update', $propertyType)}}
        @include('bo.property_types.air_form')
        {{ Aire::close() }}
    </div>
</div>

@endsection
