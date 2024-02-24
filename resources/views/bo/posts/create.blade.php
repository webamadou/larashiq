@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('Ajouter un article')}}
@endsection
@section('content')
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.posts.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercaset">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste
    </a>

    <div class="w-full mt-4 mx-auto bg-immogray1 py-2.5 px-8">
        <form action="{{route('bo.posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('bo.posts.air_form')
        </form>
    </div>
</div>
@endsection