@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__("Ajouter une catégories d'article")}}
@endsection
@section('content')
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.post_categories.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste
    </a>

    <div class="w-6/12 mx-auto bg-immogray1 py-2.5 px-8">
        {{ Aire::open()->route('bo.post_categories.store')}}
            @include('bo.post_categories.air_form')
        {{ Aire::close() }}
    </div>
</div>
@endsection