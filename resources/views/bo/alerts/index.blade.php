@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('liste des alertes')}}
    <x-audit-link model-name="Alert" />
@endsection

@section('content')
<div class="flex space-x-2 justify-center">
    
</div>
<div class="w-full px-6 py-4" x-data="confirmationModal()">
    <livewire:datatable-of-alerts />
</div>
@endsection
