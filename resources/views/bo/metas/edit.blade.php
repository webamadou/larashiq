@extends('layouts.tw_admin_v2')

@section('page-title')
    Modification des metas: {{$meta->name}}
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.metas.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-arrow-circle-left"></i> {{ __('common_terms.backToList') }}</a>
    <div class="w-full mx-auto bg-immogray1 py-2.5 px-8">

        <form action="{{route('bo.metas.update', $meta)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('bo.metas.air_form')

            <div class="flex justify-end w-100 items-end border-t-2 border-immogray2 pt-6">
                <button class="mx-2 px-6 py-2.5 bg-green-600 text-white font-medium text-xs rounded-none" aria-label="Enregistrer">
                {!!__('common_terms.save')!!} <i class="fa fa-arrow-right"></i> </button>
            </div>
        </form>
    </div>
</div>

@endsection
