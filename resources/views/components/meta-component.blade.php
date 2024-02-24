@if (! empty($meta?->title))
    <title>{{ $meta->title }}</title>
@else
    <title>Immoplus Sablux @yield('title')</title>
@endif

<meta name="description" content="{{ ! empty($meta?->description) ? $meta->description : 'Filiale du groupe Sablux Holding, leader de l’immobilier au Sénégal, ImmoPlus est la réponse à toutes vos attentes en matière de gestion immobilière. Nous vous servons un cocktail de services intégrant tous les aspects du management immobilier..' }}">

<meta name="keywords" content="{{ ! empty($meta?->keywords) ? implode(',', $meta->keywords) : 'Agence immobiliere' }}">

<meta name="generator" content="hosting-page-builder">

<meta name="article:publisher" content="Immoplus Sablux">
