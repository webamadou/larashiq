@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
<section style="min-height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 d-md-block d-sm-none image-illustration estimation_created">
            </div>
            <div class="px-2 col-md-6">
                <h1 class="text-center m-0">
                    <span class="mdi mdi-check-bold text-bg-success rounded-5 py-1 px-2"></span>
                </h1>
                <h2 class="text-center mt-1 mb-5">Votre demande d'estimation a été parfaitement enregistrée.</h2>
                <h3 class="section-title">Nous vous contacterons bientôt avec une réponse.</h3>
            </div>
        </div>
    </div>
</section>
@endsection
