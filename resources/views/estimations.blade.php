@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
<section class="p-3">
    <div class="container">
        <h1 class="section-title p-0 m-2">{{__('estimations.form_title')}}</h1>
        @livewire('forms.create-estimation', ['formData' => $formData])
    </div>
</section>
@endsection
