@extends('layouts.app')

@section('metas')
    <meta name="og:url" content="{{ route('see-post', $post->slug)}}">
    <meta name="og:locale" content="{{app()->getLocale()}}">
    <meta name="og:type" content="website">
    <meta name="og:title" content="{{$post->name}}">
    <meta name="og:description" content="{{Str::words($post->description, 35, '...')}}">
    <meta property="og:image" content="{{ $post->getDefaultImage('large') }}">
    <meta property="og:image:secure_url" content="{{ $post->getDefaultImage('large') }}">
    <meta property="og:image:alt" content="{{ $post->name }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ $post->getDefaultImage('large') }}">
@endsection

@section('title') {{ @$title}} @endsection
@section('content')
<div class="container">
    <h1 class="page-title">{{$post->name}}</h1>
    <div id="metas">
        <ul>
            <li>{{__('front.category')}} {{$post->category->name}}</li>
            <li>{{__('front.post_date')}} {{$post->updated_at->diffForHumans()}}</li>
        </ul>
    </div>
    <section class="row justify-content-center" style="height: auto; min-height: 90vh">
        <div id="page-content" class=" col-8">
            {!! $post->content !!}

            <div id="share-buttons-wrapper-post">
                {!! $shareButtons !!}
            </div>
        </div>
        <div class="col-md-4">
            <livewire:posts-side-bar :first-categ-id="$post->category_id" />
        </div>
    </section>
</div>
@endsection
