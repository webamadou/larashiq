@extends('layouts.app')

@section('title') {{ @$title}} @endsection

@section('metas')
    <meta name="og:url" content="{{ route('show-property', $property->slug)}}">
    <meta name="og:locale" content="{{app()->getLocale()}}">
    <meta name="og:type" content="website">
    <meta name="og:title" content="{{$property->name}}">
    <meta name="og:description" content="{{Str::words($property->description, 35, '...')}}">
    <meta property="og:image" content="{{ $property->getDefaultImage('large') }}">
    <meta property="og:image:secure_url" content="{{ $property->getDefaultImage('large') }}">
    <meta property="og:image:alt" content="{{ $property->name }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ $property->getDefaultImage('large') }}">
@endsection

@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
@endsection
@section('content')
    <article class="col-9 m-auto">
        <section class="pt-4">
            <div class="property-essentials-wrapper">
                <div class="property-essentials">
                    <div class="row p-0">
                        <div class="col-sm-12 col-md-8">
                            <h3>{{$property->name}}</h3>
                            <span class="mdi mdi-google-maps">
                            @if($property->localisation?->name)
                            <strong class="mt-4 property-address">
                                </span>{{$property->localisation?->name}},
                            </strong>
                            @endif
                            @if($property->city?->name)
                            <strong class="mt-4 property-address">
                                </span>{{$property->city?->name}}
                            </strong>
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <h4 class="price-line">@formatMoney($property->generate_total_cost)</h4>
                            <p class="w-100 p-0 m-0" style="text-align: right;">
                                <span class="acquisition-type">
                                    {{__('front.acquisition'.$property->acquisition_type)}}</span>
                            </p>
                            <div class="d-flex justify-content-end">
                                <div class="button-create-meeting">
                                    <a href="#create-alert" class="btn btn-primary rounded-0" style="color: #fff">
                                        <span class="mdi mdi-calendar-cursor"></span> {{__('front.create_meeting')}}
                                    </a>
                                </div>
                                <div class="button-favorites rounded-0 ms-1">
                                    @livewire('add-to-favorite', ['property' => $property])
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 py-3">
                            <div class="image-wrapper position-relative">
                                <div class="image">
                                    <a href="#" class="imageModalTrigger"
                                           data-bs-toggle="modal"
                                           data-bs-target="#imageModal"
                                           style="background: url({{asset($property->getDefaultImage('large'))}});
                                            background-size: cover;
                                            background-repeat: no-repeat;
                                            background-position: center;
                                            display: block;
                                            width: 100%;
                                            height: 100%;"
                                       title="{{$property->name}}">
                                    </a>
                                </div>
                                <div id="owner-details">
                                    <span class="mdi mdi-card-account-details"></span> {{$property->theOwner?->fullname}}
                                </div>
                                <div class="image-links">
                                    @if($property->embedded_url)
                                    <div class="see-3d">
                                        <a href="#" class="">
                                            <span class="mdi mdi-video-3d-variant"></span> {{__('front.visit_3d')}}
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row justify-content-center mt-4" style="background: #f9f9f9; border: 1px solid #e9e9e9;">
                                @foreach($property->images as $image)
                                    <div class="col-2 prop-image-vignettes mx-1 mb-1"
                                         data-target="#image-{{$image->id}}"
                                         style="background: url('{{asset($image->large)}}');
                                            background-repeat: no-repeat;
                                            background-size: contain;
                                            background-position: center center;
                                            border: 3px solid #fff;
                                            cursor: pointer;"
                                             class="d-block"
                                             alt="{{$property->name}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-0">
            <div class="description">
                {!! $property->description !!}
            </div>
        </section>
        <section class="py-2" id="details-commodities">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h4 class="mt-5 py-4">{{__('front.details')}}</h4>
                    <ul class="property-details">
                        @if($property->nbr_rooms)
                        <li>
                            <span class="mdi mdi-sofa-single-outline"></span> {{$property->nbr_rooms}} {{trans_choice('front.rooms', $property->nbr_rooms)}}
                        </li>
                        @endif
                        @if($property->nbr_lounge_rooms)
                        <li>
                            <span class="mdi mdi-sofa-outline"></span> {{$property->nbr_lounge_rooms}} {{trans_choice('front.lounge_rooms', $property->nbr_lounge_rooms)}}
                        </li>
                        @endif
                        @if($property->nbr_bedrooms)
                        <li>
                            <span class="mdi mdi-bed-outline"></span> {{$property->nbr_bedrooms}} {{trans_choice('front.bed_rooms', $property->nbr_bedrooms)}}
                        </li>
                        @endif
                        @if($property->nbr_kitchens)
                        <li>
                            <span class="mdi mdi-faucet-variant"></span> {{$property->nbr_kitchens}} {{trans_choice('front.kitchens', $property->nbr_kitchens)}}
                        </li>
                        @endif
                        @if($property->nbr_bathrooms)
                        <li>
                            <span class="mdi mdi-shower"></span> {{$property->nbr_bathrooms}} {{trans_choice('front.bathrooms', $property->nbr_bathrooms)}}
                        </li>
                        @endif
                        {{--@if($property->nbr_showerrooms)
                        <li>
                            <span class="mdi mdi-shower-head"></span> {{$property->nbr_showerrooms}} {{trans_choice('front.showerrooms', $property->nbr_showerrooms)}}
                        </li>
                        @endif--}}
                    </ul>
                    <h4 class="mt-5 py-4">Commodités</h4>
                    <ul>
                        <div class="row commodities-list">
                            @foreach($property->commodities as $key => $commodity)
                                <div class="col-md-4 col-sm-6">
                                    <li>
                                        <span class="mdi {{$commodity?->icon_classes}}"></span> {{$commodity->name}}
                                    </li>
                                </div>
                            @endforeach
                        </div>
                    </ul>
                    <div id="share-buttons-wrapper">
                        {!! $shareButtons !!}
                    </div>
                </div>
                <div id="create-alert" class="col-12 col-md-5">
                    @include('layouts.partial.koalendar_embed')
                </div>
            </div>
        </section>

        <section class="mt-5 mb-0 position-relative overflow-hidden" style="height: 300px;">
            <div id="map-h" class="col-4"></div>
        </section>
        <!-- similar properties section-->
        <section class="text-center --bg-gradient-primary-to-secondary" id="list-properties-wrapper">
            <div class="container position-relative">
                <h2 class="section-title">{{__('front.similar_props')}}</h2>
                <livewire:list-properties :properties="$properties" :carousel="true"/>
            </div>
        </section>
    </article>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-0" style="background: transparent">
      <div class="modal-body" style="background: transparent">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
              <div class="carousel-inner">
                  @foreach($property->images as $image)
                      <div id="image-{{$image->id}}"
                           class="carousel-item {{$loop->first ? 'active' : ''}}"
                           style="height: 90vh">
                          <div
                           style="background: url('{{asset($image->large)}}');
                            background-position: center center;
                            background-size: contain;
                            background-repeat: no-repeat;
                            position:relative;
                            width: 100%;
                            height: 100%;">
                  <button type="button" class="btn btn-secondary"
                          style="border-radius: 0; font-size: small; font-weight: 400"
                          data-bs-dismiss="modal"
                          aria-label="Fermer">Fermer</button>
                          </div>
                      </div>
                  @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev" aria-label="previous">
                  <span class="mdi mdi-chevron-left" aria-hidden="true"></span>
                  <span class="visually-hidden">{{__('common_tems.previous')}}</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next" aria-label="next">
                  <span class="mdi mdi-chevron-right" aria-hidden="true"></span>
                  <span class="visually-hidden">{{__('common_tems.next')}}</span>
              </button>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer_scripts')
    <x-maptailer :items="$property" container="map-h" mapZoom="12" :is-single="true"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <script>
        $('.prop-image-vignettes').on('click', function(e){
            e.preventDefault();
            const target = $(this).data('target');
            $('.carousel-item').removeClass('active');
            $(`${target}`).addClass('active');

            $('#imageModal').modal('show')
        })

        /*$('.close-modal').on('click', function(e) {
            $('#imageModal').modal('hide');
            $('.modal-backdrop').removeClass('show')
        })*/
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        jQuery(document).ready(function($){
            $(`.owl-carousel`).owlCarousel({
                nav: false,
                loop: true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:false,
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
