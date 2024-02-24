@extends('layouts.app')

@section('title') {{$title}} @endsection
@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
@endsection
@section('content')
    <!-- Mashead header-->
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center--">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 m; text-center text-lg-start bilboard-messages">
                        <h1 class="display-5 lh-1 mt-3">
                            {{$configuration->bilboard_title}}
                        </h1>
                    </div>
                </div>
                <div class="col-lg-6 bg-light p-4 shadow-lg position-relative" id="homeSearchWrapper">
                    <!-- Masthead search form-->
                    <nav id="myTab">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active"
                                    id="nav-rent-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#nav-rent"
                                    type="button"
                                    role="tab"
                                    aria-controls="nav-rent"
                                    aria-selected="true"
                                    aria-label="Louer">Louer</button>
                            <button class="nav-link"
                                    id="nav-buy-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#nav-buy"
                                    type="button"
                                    role="tab"
                                    aria-controls="nav-buy"
                                    aria-selected="false"
                                    aria-label="Acheter">Acheter</button>
                            <button class="nav-link"
                                    id="nav-estimation-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#nav-estimation"
                                    type="button"
                                    role="tab"
                                    aria-controls="nav-estimation"
                                    aria-selected="false"
                                    aria-label="Estimation">Estimation</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-rent" role="tabpanel"
                             aria-labelledby="nav-rent-tab" tabindex="0">
                            <div class="formWrapper">
                                 <div class="mb-4">&nbsp;</div>
                                <form class="row g-3" action="{{route('search-prop')}}">
                                    @csrf
                                    <input
                                        type="hidden"
                                        name="acquisitionType"
                                        value="{{\App\Models\Property::ACQUISITION_RENT}}">
                                    @livewire('input-search-localisation')

                                    @livewire('components.price-ranges')
                                    <div class="input-group mb-3">
                                    @livewire('property-type-fields',
                                    [
                                        'selectedValue' => "old('property_type_id')",
                                        'parentFieldName' => "property_type_id",
                                        'childFieldName' => "property_type_child_id",
                                    ])
                                    </div>
                                    <div class="col-12 flex justify-content-center seach-submiter position-absolute">
                                        <button type="submit" class="btn btn-primary" aria-label="rechercher">
                                            <span class="mdi mdi-magnify"></span>Rechercher
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-buy" role="tabpanel" aria-labelledby="nav-profile-tab"
                             tabindex="0">
                            <div class="formWrapper">
                                 <div class="mb-2">&nbsp;</div>
                                <form class="row g-3" action="{{route('search-prop')}}">
                                    @csrf
                                    <input
                                        type="hidden"
                                        name="acquisitionType"
                                        value="{{\App\Models\Property::ACQUISITION_BUY}}"
                                    >
                                    @livewire('input-search-localisation')

                                    @livewire('components.price-ranges')
                                    <div class="input-group mb-3">
                                        @livewire('property-type-fields',
                                        [
                                            'selectedValue' => "old('property_type_id')",
                                            'parentFieldName' => "property_type_id",
                                            'childFieldName' => "property_type_child_id",
                                        ])
                                    </div>
                                    <div class="col-12 flex justify-content-center seach-submiter position-absolute">
                                        <button type="submit" class="btn btn-primary" aria-label="Rechercher">
                                            <span class="mdi mdi-magnify"></span>Rechercher
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-estimation" role="tabpanel"
                             aria-labelledby="nav-contact-tab"
                             tabindex="0">
                            <div class="formWrapper">
                                <h4 class="mb-2 my-4">Estimez gratuitement votre bien en moins de 2 minutes</h4>
                                <form class="row g-3">
                                    @livewire('input-search-localisation')
                                    <div class="col-12 flex justify-content-center seach-submiter position-absolute">
                                        <a href="{{route('create-estimation')}}" aria-label="Estimer" class="btn btn-primary rounded-0" aria-label="Estimer"
                                           style="font-weight: 100; letter-spacing: 3px; color: #fff">
                                            <span class="mdi mdi-content-save"></span> Estimer
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mx-auto" id="call-to-actions">
            <div class="gap-2 d-flex justify-content-sm-center">
                <a href="{{route('create-estimation')}}" class="btn btn-primary btn-lg px-4 gap-3 m3-2"
                    style="color: #ffffff" aria-label="{{__('front.estimate')}}">
                    <span class="mdi mdi-laptop"></span>
                    {{__('front.estimate')}}
                </a>
                <a href="{{route('create-alert')}}" class="btn btn-outline-secondary btn-lg px-4 bg-light ms-2" aria-label="{{__('front.create_alert')}}">
                    <span class="mdi mdi-bell-badge"></span>
                    {{__('front.create_alert')}}
                </a>
            </div>
        </div>
    </header>
    <!-- debut furnished properties section-->
    @if ($furnishedProperties->count() > 0)
    <section class="text-center --bg-gradient-primary-to-secondary pb-1" id="list-furnished-properties-wrapper">
        <div class="container position-relative">
            <h2 class="section-title">{{__('front.furnished_props')}}</h2>
            <livewire:list-properties :properties="$furnishedProperties" :carousel="true"
                                      carouselId="furnished_props" />
        </div>
    </section>
    @endif
    <!-- debut video section-->
    <section id="video-section" class="pb-0 pt-2 my-5">
        <div class="container px-5 video-wrapper row">
            <div class="col-sm-12 col-md-6 col-lg-4 video-section-text d-flex flex-column justify-content-center">
                <h2 class="mb-4" style="text-align: justify;">{{ $configuration->home_video_title }}</h2>
                <div class="video-section-text-content">
                    {!! $configuration->home_video_subtitle !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-8 video-section-wrapper">
                <div class="video-content">
                    {!! $configuration->home_video_embed_code !!}
                </div>
            </div>
        </div>
    </section>
    <!-- debut vogue properties section-->
    @if ($vogueProperties->count() > 0)
    <section class="text-center --bg-gradient-primary-to-secondary pb-1" id="list-vogue-properties-wrapper">
        <div class="container position-relative">
            <h2 class="section-title">{{__('front.highlighted_props')}}</h2>
            <livewire:list-properties :properties="$vogueProperties" :carousel="true" carouselId="vogue_props" />
        </div>
    </section>
    @endif
    <!-- debut advertising section-->
    <section id="features" class="bg-light py-0 my-4">
        <div class="container px-5 adds-wrapper row">
            <div class="col-sm-12 col-md-6 adds-item-wrapper">
                <div class="add-content video-wrapper">
                    {!! $configuration?->home_bloc_one_video !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-6 adds-item-wrapper">
                <div class="add-image"
                     style="background: url({{$homeStaging?->image?->url}});
                      background-size: cover;
                       background-repeat: no-repeat;"></div>
                <div class="add-content">
                    <div class="home-staging">
                        <h3>
                            <a href="{{route('show-program', $program?->slug)}}" aria-label="{{ $program->name }}">
                                {{ $program->name }}
                            </a>
                        </h3>
                        <div class="program_description">{!! $program?->home_description !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- debut properties section-->
    <section class="text-center --bg-gradient-primary-to-secondary pb-0" id="list-properties-wrapper">
        <div class="container position-relative">
            <h2 class="section-title">{{__('front.last_published_props')}}</h2>
            <livewire:list-properties :properties="$properties" :carousel="true" carouselId="last_props" />
            <div class="read_more">
                <a href="{{route('all-biens')}}" aria-label="{{__('front.all-biens')}}">{{__('front.all-biens')}} <span class="mdi
                mdi-menu-right-outline"></span></a>
            </div>
        </div>
    </section>
    <!-- debut actualites section-->
    <section class="text-center --bg-gradient-primary-to-secondary" id="list-posts-wrapper">
        <div class="container">
            <h2 class="section-title">{{__('front.last_published_posts')}}</h2>
            <div class="row justify-content-center prop-vignettes-wrapper">
                @foreach($posts as $post)
                    <livewire:posts-vignette :post="$post"/>
                @endforeach
            </div>
        </div>
    </section>
    <!--  debut map section  -->
    <section id="stats-map"  class="bg-light home-map-wrapper d-md-block d-sm-none">
        <div class="container px-5">
            <div class="row gx-5" id="home-stats-wrapper">
                <div class="col">
                    <div class="text-center">
                        <i class="mdi mdi-emoticon-happy-outline icon-primary icon-5 mb-3"></i>
                        <h3 class="font-alt">92% de clients satisfaits</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <i class="mdi mdi-home-city icon-primary icon-5 mb-3"></i>
                        <h3 class="font-alt">Plus de 1100 biens gérés</h3>
                    </div>
                </div>
                <div class="col mb-md-0">
                    <div class="text-center">
                        <i class="mdi mdi-transit-connection-variant icon-primary icon-5 mb-3"></i>
                        <h3 class="font-alt">Un réseau de 3 agences</h3>
                    </div>
                </div>
            </div>
            <div id="map-h"></div>
        </div>
    </section>
    <!-- Social section-->
    <section class="cta">
        <div class="cta-content">
            <div class="container px-5">
                <div class="container position-relative">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 newsletter-wrapper">
                            @livewire('subscribe-news-letter')
                        </div>
                        <div class="col-sm-4 offset-2 socials-wrapper">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-4">{{config('socials.ursl.fb')}}
                                    <a href="{{$configuration->facebook_link}}" target="_blank" aria-label="facebook"><span class="mdi
                                    mdi-facebook"></span></a>
                                </li>
                                <li class="list-inline-item me-4">
                                    <a href="{{config('services.socials.urls.li')}}" target="_blank" aria-label="linkedin"><span class="mdi
                                    mdi-linkedin"></span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{config('services.socials.urls.ig')}}" target="_blank" aria-label="instagram"><span class="mdi
                                    mdi-instagram"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_scripts')
    <x-maptailer :items="$pinnedProperties"
                 container="map-h"
                 mapZoom="12"
                 :mapCenter="['14.717178297028031', '-17.467381018110885']"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        jQuery(document).ready(function($){
            $(`.owl-carousel`).owlCarousel({
                nav: false,
                loop: true,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                allowDots: false,
                dots: false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    900:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                },
                onInitialized: function (e) {
                    $('.prop-vignettes-wrapper').css({'background-image': 'none'})
                },
            });
        });
    </script>
@endsection
