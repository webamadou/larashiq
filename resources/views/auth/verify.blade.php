@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 100vh">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>{{ __('common_terms.verified_email') }}</h3></div>

                <div class="card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {!! __('common_terms.welcome') !!}
                    <p class="mt-4">
                        {{ __('common_terms.before_proceed') }}<br>
                        {{--{{ __('common_terms.if_no_email') }}--}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
