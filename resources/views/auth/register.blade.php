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
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <h1><span class="mdi mdi-account-plus"></span> {{__('common_terms.signup')}}</h1>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('common_terms.name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('common_terms.first_name') }}</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name')
                            is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('common_terms.email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">
                        {{ __('common_terms.password') }}
                    </label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                        {{ __('common_terms.confirm_password') }}
                    </label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="d-flex justify-content-between">
                        @if (Route::has('password.request'))
                            <a class="btn" href="{{ route('login') }}">
                                <span class="mdi mdi-login"></span> {{ __('common_terms.have_account') }}
                            </a>
                        @endif
                        <button type="submit" class="btn btn-primary" aria-label="{{ __('Register') }}">
                            <span class="mdi mdi-account-plus"></span> {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </section>
@endsection
