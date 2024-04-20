@extends('layouts.admin_v3')

@section('page-title')
    Modification de l'article {{$post->name}}
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<section class="w-full">
    <a href="{{route('bo.posts.index')}}"
    class="btn btn-success">
        <i class="mdi mdi-chevron-left"></i> {{ __('common_terms.backToList') }}
    </a>
    <div class="w-75 px-8 py-4 mx-auto">
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
</section>

@endsection
