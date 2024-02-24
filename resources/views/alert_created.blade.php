@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
<section style="min-height: 100vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 d-md-block d-sm-none image-illustration alert_created">
            </div>
            <div class="px-2 col-md-5">
                <h1 class="text-center m-0">
                    <span class="mdi mdi-check-bold text-bg-success rounded-5 py-1 px-2"></span>
                </h1>
                <h2 class="text-center mt-1 mb-5">Votre alerte a été parfaitement enregistrée.</h2>
                <h3 class="section-title">Vous recevrez un mail dès qu'un produit correspondant à vos besoins sera disponible</h3>
            </div>
        </div>
    </div>
</section>
@endsection
