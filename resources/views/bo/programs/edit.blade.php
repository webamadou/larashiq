@extends('layouts.tw_admin_v2')

@section('page-title')
    Modification du programme {{$program->name}}
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.programs.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste
    </a>
    <a href="{{route('bo.programs.show', $program)}}"
       class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase">
        <i class="fa fa-eye"></i> Afficher le programme
    </a>
    <div class="w-full mt-3 mx-auto bg-immogray1 py-2.5 px-8">
        <form action="{{route('bo.programs.update', $program)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('bo.programs.air_form')
        </form>
    </div>
</div>

@endsection
