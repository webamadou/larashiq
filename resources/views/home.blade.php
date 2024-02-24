@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
<div class="container">
    <h1>This is a test</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connecté!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
