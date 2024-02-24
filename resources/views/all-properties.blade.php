@extends('layouts.app')

@section('title') {{ @$title}} @endsection

@section('content')
        @livewire('properties-listing', [
            'filterTitle' => $title,
            'filterFields' => $filterFields,
            'acquisitionType' => $q['acquisitionType'] ?? null,
            'localisationName' => $q['localisation'] ?? null,
            'budgetMax' => $q['budgetMax'] ?? null,
            'budgetMin' => $q['budgetMin'] ?? null,
            'surfaceMin' => $q['surfaceMin'] ?? null,
            'surfaceMax' => $q['surfaceMax'] ?? null,
            'propertyTypes' => $q['propertyType'] ?? [],
            'propertyType' => $q['property_type_id'] ?? null,
            'propertyTypeChild' => $q['property_type_child_id'] ?? null,
            'orderColumn' => $q['orderColumn'] ?? 'created_at',
            'orderDirection' => $q['orderDirection'] ?? 'desc',
            'furnished' => $q['furnished'] ?? 0,
            'categoryId' => $q['categoryId'] ?? 0
        ])

@endsection
