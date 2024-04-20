@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('Ajouter une page')}}
@endsection
@section('content')
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.pages.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercaset">
        <i class="fa fa-arrow-circle-left"></i> {{ __('common_terms.backToList') }}
    </a>

    <div class="w-full mt-4 mx-auto bg-immogray1 py-2.5 px-8">
        <form action="{{route('bo.pages.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('bo.pages.air_form')
        </form>
    </div>
</div>
@endsection