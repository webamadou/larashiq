@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('header_scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
@endsection
@section('content')
<section class="content-section long-height" id="catalogues">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading text-center">
            <h2 class="section-title m-2">{{__('front.our_catalogues')}}</h2>
            <p class="page_subtitle mb-3">
                Cliquez sur l'image pour télécharger le fichier PDF d'un de nos catalogues
            </p>
        </div>
        <div class="row gx-0">
            @foreach($catalogues as $catalogue)
            <div class="col-lg-6">
                <a class="catalogues-item"
                    href="{{$catalogue->pdf_file_url}}"
                    target="_blank"
                    style="background: url('{{$catalogue->images->first()->url}}');
                            background-position: center;
                            background-repeat: no-repeat;
                            background-size: cover;"
                    >
                    <div class="caption">
                        <div class="caption-content">
                            <div class="h2">{{$catalogue->name}}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('footer_scripts')

@endsection
