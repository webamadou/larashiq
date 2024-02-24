@extends('layouts.app')

@section('content')
<section class="vh-100">
    <div class="container h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-sm-12 col-md-4 left-side-illustration d-flex h-100 align-items-center ">
          <img src="{{asset('images/svg/AppLocker Permission.svg')}}"
            class="img-fluid" alt="Phone image">
        </div>
        <div class="col-sm-12 col-md-8 authentication-forms">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <h1>{{__('common_terms.signin')}}</h1>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('common_terms.email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid
                        @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('common_terms.password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('common_terms.remember_me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="d-flex justify-content-between">
                        @if (Route::has('password.request'))
                            <a class="btn" href="{{ route('register') }}">
                                <span class="mdi mdi-account-plus"></span> {{ __('common_terms.signup') }}
                            </a>
                        @endif
                        @if (Route::has('password.request'))
                            <a class="btn" href="{{ route('password.request') }}">
                                <span class="mdi mdi-lock-alert"></span> {{ __('common_terms.forgot_password') }}
                            </a>
                        @endif

                        <button type="submit" class="btn btn-primary btn-sm px-5" aria-label="{{ __('common_terms.login') }}">
                            <span class="mdi mdi-login"></span> {{ __('common_terms.login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </section>
@endsection
