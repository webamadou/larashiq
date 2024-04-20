@extends('layouts.admin_v3')

@section('page-title')
    {{__('Ajouter un article')}}
@endsection
@section('content')
<section class="w-full h-100">
    <a href="{{route('bo.posts.index')}}" class="btn btn-success">
        <i class="mdi mdi-chevron-left"></i> {{ __('common_terms.backToList') }}
    </a>
    <div class="w-75 px-8 py-4 mx-auto">
        <div class="w-full mt-4 mx-auto bg-immogray1 py-2.5 px-8">
            <form action="{{route('bo.posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('bo.posts.air_form')
            </form>
        </div>
    </div>
</section>
@endsection