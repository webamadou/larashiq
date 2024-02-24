@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
<div class="container">
    <h1 class="page-title">{{$program->name}}</h1>
    <section class="row mx-5 justify-content-center" style="height: auto; min-height: 90vh">
        <div id="page-content">
            {!! $program->content !!}
        </div>
    </section>
</div>
@endsection
