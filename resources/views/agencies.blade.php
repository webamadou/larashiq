@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
<section style="min-height: 100vh">
    <div class="container">
        <h1 class="section-title">{{__('front.agencies')}}</h1>
        <div class="row justify-content-center">
            @foreach($agencies as $agency)
                <div class="col-sm-6 col-md-4 mb-5">
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('images/favicon_io/android-chrome-192x192.png')}}" alt="immoplus" width="200">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$agency->name}}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">&nbsp;</li>
                                <li class="list-group-item">
                                    <span class="text-immo-primary mdi mdi-home-map-marker"></span> {{$agency->address}}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-immo-primary mdi mdi-phone"></span> {{$agency->phone_number}}
                                </li>
                                <li class="list-group-item">
                                    <span class="text-immo-primary mdi mdi-at"></span> {{$agency->email}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
