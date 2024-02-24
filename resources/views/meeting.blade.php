@extends('layouts.app')

@section('title') {{@$title}} @endsection
@section('content')

<section>
    <div class="container">
        <h2 class="section-title">{{__('front.meeting_title')}}</h2>
        <div class="row justify-content-center">
            @include('layouts.partial.koalendar_embed')
            <div class="col-sm-5" style="background: url('{{asset('images/add2.jpg')}}');
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        background-position: top left">
            </div>
        </div>
    </div>
</section>
@endsection

