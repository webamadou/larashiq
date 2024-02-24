@extends('layouts.app')

@section('title') {{ @$title}} @endsection
@section('content')
<h1 class="section-title mt-5 d-none">{{$title}}</h1>
    @livewire('property-search', [
        'filterTitle' => $filterTitle,
        'acquisition' => $q['acquisitionType'] ?? \App\Models\Acquisition::RENTING,
        'localisationName' => $q['localisation'] ?? null,
        'budgetMax' => $q['budgetMax'] ?? null,
        'budgetMin' => $q['budgetMin'] ?? null,
        'surfaceMin' => $q['surfaceMin'] ?? null,
        'surfaceMax' => $q['surfaceMax'] ?? null,
        'propertyTypes' => $q['propertyType'] ?? [],
        'propertyType' => $q['property_type_id'] ?? null,
        'propertyTypeChild' => $q['property_type_child_id'] ?? null,
        'orderColumn' => $q['orderColumn'] ?? 'created_at',
        'orderDirection' => $q['orderDirection'] ?? 'desc'
    ])

@endsection
