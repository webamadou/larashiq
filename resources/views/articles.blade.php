@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
    <section class="text-center --bg-gradient-primary-to-secondary long-height" id="list-posts-wrapper">
        <div class="container">
            @if ($categ && is_object($categ))
                <!-- <h2 class="section-title">{{__('front.post_title', ['categ' => $categ?->name])}}</h2> -->
            @endif
            <div class="row justify-content-center prop-vignettes-wrapper">
                <div class="col-sm-12 col-md-8">
                    @foreach($posts as $post)
                        <livewire:posts-lines :post="$post" :key="$post->id" />
                    @endforeach
                </div>
                <div class="col-md-4 d-sm-none d-md-block">
                    <livewire:posts-side-bar :first-categ-id="$categ?->id" />
                </div>
            </div>
        </div>
    </section>
@endsection
