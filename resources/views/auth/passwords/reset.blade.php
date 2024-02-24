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
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="row"><h1>{{__('common_terms.reinit_password')}}</h1></div>
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('common_terms.email')
                    }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" aria-label="{{ __('passwords.reset_title') }}">
                            <span class="mdi mdi-autorenew"></span> {{ __('passwords.reset_title') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</section>
@endsection
