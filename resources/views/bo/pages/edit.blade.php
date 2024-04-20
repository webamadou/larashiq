@extends('layouts.tw_admin_v2')

@section('page-title')
    Modification de la page {{$page->name}}
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.pages.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase">
        <i class="fa fa-arrow-circle-left"></i> {{ __('common_terms.backToList') }}
    </a>
    <a href="{{route('bo.pages.show', $page)}}"
       class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase">
        <i class="fa fa-eye"></i> Afficher la page
    </a>
    <div class="w-full mt-3 mx-auto bg-immogray1 py-2.5 px-8">
        <form action="{{route('bo.pages.update', $page)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('bo.pages.air_form')
        </form>
    </div>
</div>

@endsection
