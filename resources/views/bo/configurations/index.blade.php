@extends('layouts.tw_admin_v2')

@section('page-title')
    Configurations
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<div class="w-full px-8 py-4 mx-auto">
    <div class="w-6/12 mx-auto bg-immogray1 py-2.5 px-8">
        {{ Aire::open()->route('bo.configurations.update', $configuration)}}
        @include('bo.configurations.air_form')
        {{ Aire::close() }}
    </div>
</div>

@endsection
