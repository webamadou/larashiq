@extends('layouts.admin_v3')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-cog"></i>
            </span> Liste des biens
        </h3>
    </div>
    <div class="my-4 d-flex justify-content-center">
        <div class="col-2">
            <a href="{{route('bo.properties.steps.create', 1)}}"
            class="btn btn-primary btn-sm">
                <i class="mdi mdi-plus"></i> Ajouter un bien
            </a>
        </div>
        <div class="col-2">
            @livewire('components.kayloo-actions')
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
