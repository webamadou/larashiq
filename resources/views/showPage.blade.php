@extends('layouts.app')

@section('metas')
    <meta name="og:url" content="{{ route('see-page', $page->slug)}}">
    <meta name="og:locale" content="{{app()->getLocale()}}">
    <meta name="og:type" content="website">
    <meta name="og:title" content="{{$page->name}}">
    <meta name="og:description" content="{{Str::words($page->description, 35, '...')}}">
    <meta property="og:image" content="{{ $page->getDefaultImage('large') }}">
    <meta property="og:image:secure_url" content="{{ $page->getDefaultImage('large') }}">
    <meta property="og:image:alt" content="{{ $page->name }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ $page->getDefaultImage('large') }}">
@endsection

@section('title') {{ @$title}} @endsection
@section('content')
<div class="container">
    <h1 class="page-title">{{$page->name}}</h1>
    <section class="row mx-5 justify-content-center" style="height: auto; min-height: 90vh">
        <div id="page-content">
            {!! $page->content !!}
        </div>

        <div id="share-buttons-wrapper-page">
            {!! $shareButtons !!}
        </div>
    </section>
</div>
@endsection
