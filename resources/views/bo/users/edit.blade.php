@extends('layouts.admin_v3')

@section('page-title')
    Modification du profil {{$user->fisrt_name}} {{$user->name}}.
@endsection
@section('content')
<x-form-error />
<section class="w-full h-full mb-5">
    <div class="py-3">
        <a href="{{route('bo.users.index')}}" class="btn btn-success">
            <i class="mdi mdi-chevron-left"></i> Retour à la liste
        </a>
        <a href="{{route('bo.users.show', $user)}}" class="btn btn-default">
            <i class="mdi mdi-information"></i> Afficher les infos
        </a>
    </div>

    <div class="w-75 justify-content-center d-flex m-auto py-2.5 px-8 my-6 bo-form">
        <div class="w-6/12 mx-auto bg-immogray1 py-2.5 px-8 my-6">
            {{ Aire::open()->route('bo.users.update', $user)}}
            @include('bo.users.air_form')
            {{ Aire::close() }}
        </div>
    </div>
</section>

@endsection
