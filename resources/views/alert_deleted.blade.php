@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
    <section class="text-center --bg-gradient-primary-to-secondary long-height" id="list-posts-wrapper">
        <div class="container">
        <h1 class="text-center m-0">
                    <span class="mdi mdi-check text-bg-success rounded-5 py-1 px-2"></span>
                    {{__('front.confirm_deleted_alert')}}
                </h1>

            <div class="row justify-content-center prop-vignettes-wrapper mt-5">
                <div class="col-auto">
                    <a href="{{route('mon-compte')}}" class="btn btn-primary rounded-0" style="color: #fff">
                        <span class="mdi mdi-list-box"></span> Voir mes alertes
                    </a>
                    <a href="{{route('home-page')}}" class="btn btn-primary rounded-0" style="color: #fff">
                        <span class="mdi mdi-home"></span> Retour vers la pages
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
