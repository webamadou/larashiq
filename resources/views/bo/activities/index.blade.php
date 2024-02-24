@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('activities.bo_activities_title', ['className' => $className])}}
    
@endsection

@section('content')

<div class="w-full px-6 py-4" x-data="confirmationModal()">
    <livewire:datatable-of-activities :className="$fullClassName" />
</div>
@endsection
