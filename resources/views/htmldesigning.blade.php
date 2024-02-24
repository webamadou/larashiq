@extends('layouts.app')

@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
@endsection
@section('content')
    <!-- Mashead header-->
    <section id="estimation-alert-form" class="row" style="height: 80vh; background: url('https://dev.sabluximmoplus.com/images/estimation0.jpeg');
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: center 80%;
                                    height: inherit;
                                    transition: all ease-in-out .8s;">
        <div id="purple-overlay"></div>
        <div class="row">
            <div class="title-wrapper">
                <h1>Adresse</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis numquam, distinctio ratione, fuga nesciunt, saepe illo.</p>
            </div>
        </div>
    </section>
@endsection
@section('footer_scripts')

@endsection
