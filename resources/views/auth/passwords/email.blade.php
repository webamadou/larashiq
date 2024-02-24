@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-sm-4 col-md-6 left-side-illustration d-flex h-100 align-items-center ">
          <img src="{{asset('images/svg/Computing.svg')}}"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-sm-12 col-md-6 authentication-forms">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                @if (session('status'))
                    <h2 class="row alert alert-primary rounded-0 mx-1" role="alert"
                        style="color: var(--immopurple); background: #fff; font-weight: 300;"
                    >
                        {{ session('status') }}
                    </h2>
                @endif
                <div class="row">
                    <h1>{{__('common_terms.reset_password_header')}}</h1>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary px-5" aria-label="{{ __('common_terms.send') }}">
                            <span class="mdi mdi-send-check"></span> {{ __('common_terms.send') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</section>
@endsection
