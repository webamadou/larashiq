@extends('layouts.tw_admin_v2')

@section('page-title')
    Modification de l'article {{$post->name}}
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.posts.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste
    </a>
    <a href="{{route('bo.posts.show', $post)}}"
       class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase">
        <i class="fa fa-eye"></i> Afficher l'article
    </a>
    <div class="w-full mt-3 mx-auto bg-immogray1 py-2.5 px-8">
        <form action="{{route('bo.posts.update', $post)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('bo.posts.air_form')
        </form>
    </div>
</div>

@endsection
