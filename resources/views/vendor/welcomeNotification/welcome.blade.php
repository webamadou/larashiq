@extends('layouts.app')

@section('content')
<div class="container" id="login-wrapper">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow-lg pink-bottom-border">
                <div class="card-header text-center"><h3>{{ __('Initialiser votre mot de passe') }}</h3></div>
                <div class="text-center text-lg">Remplissez le formulaire pour créer un mot de passe</div>
                <div class="card-body">
                        <form method="POST">
                            @csrf

                            <input type="hidden" name="email" value="{{ $user->email }}"/>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" name="password_confirmation" required
                                           autocomplete="new-password" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-7 offset-md-5">
                                    <button type="submit" class="btn btn-primary btn-sm px-5" aria-label="Enregistrer">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
