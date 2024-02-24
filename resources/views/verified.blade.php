@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
<div class="main h-100">
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary"
    style = "background: url(http://localhost:8000/images/successful-deal.png);
    background-position: right bottom; background-size: 50%; background-repeat: no-repeat;">
        <div class="col-md-6 p-lg-5 mx-auto my-5">
            <h1 class="display-3 fw-bold">{!! __('common_terms.verified') !!}</h1>
            <h3 class="fw-normal text-muted mb-3">{!! __('common_terms.verified_message') !!} </h3>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
                <p class="mb-4">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </p>
                <a class="icon-link" href="#">
                  &nbsp;
                </a>
                <a class="icon-link" href="{{route('home-page')}}">
                  Page d'accueil
                  <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
                </a>
            </div>
        </div>
  </div>
</div>
@endsection
