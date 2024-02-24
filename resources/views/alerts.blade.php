@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
<section class="p-2" style="min-height: 100vh">
    <div class="container">
        <h1 class="section-title">{{__('front.create_alerte_title')}}</h1>
<!--        <div class="row justify-content-center">
            <div class="image-illustration col-md-6 d-md-block d-sm-none"
                 style="background: url('{{asset('images/add4.jpg')}}');
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: top left;
                    height: 90vh;">
            </div>
            <div class="px-2 col-md-6">-->
                @livewire('forms.create-alert', ['formData' => $formData])
<!--            </div>
        </div>-->
    </div>
</section>
@endsection
