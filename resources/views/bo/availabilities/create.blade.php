@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('Ajouter une disponibilité')}}
@endsection
@section('content')
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.availabilities.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-arrow-circle-left"></i> {{ __('common_terms.backToList') }}
    </a>

    <div class="w-6/12 mx-auto bg-immogray1 py-2.5 px-8">
        {{ Aire::open()->route('bo.availabilities.store')}}
            @include('bo.availabilities.air_form')
        {{ Aire::close() }}
    </div>
</div>
@endsection