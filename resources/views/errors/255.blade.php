@extends('layouts.app')

@section('content')
<section style="min-height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="background: url('{{asset('images/svg/403 forbidden V1.svg')}}');
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        background-position: top left;
                                        height: 90vh;">
                <h1 class="text-center m-0">
                    <span class="mdi mdi-alert-circle text-bg-warning rounded-5 py-1 px-2"></span>
                    {{__('front.255_message')}}
                </h1>
                <div class="text-center flex justify-content-center">
                    <a  href="{{route('home-page')}}" class="btn btn-primary rounded-0 mt-5 p-3">
                        <span class="mdi mdi-home"></span> {{__('front.back_to_home')}}
                    </a>
                </div>
            </div>
            <div class="px-2 col-md-5">

            </div>
        </div>
    </div>
</section>
@endsection
