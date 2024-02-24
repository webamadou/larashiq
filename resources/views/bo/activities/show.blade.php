@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('activities.page_title', ['title' => $pageTitle])}}
@endsection

@section('content')
    <div class="w-full px-8 py-4 mx-auto">
        <a href="{{ route('bo.activities.index', [$subjectType]) }}"
           class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase">
            <i class="fa fa-arrow-circle-left"></i> {{ __('activities.back_to_logs') }}
        </a>
    </div>
    <div
        class="flex mt-8 flex-wrap border-r border-l-3 bg-immogray1"
        style="overflow: scroll; max-height: 50vh"
    >
        <div class="w-full md:w-1/2 xl:w-3/12 p-6 border-l-4 border-immopurple">
            <p>
                <strong>{{ __('activities.action_'.$activity->event.'_by') }}</strong>
                {{$activity->causer->full_name}}
            </p>
            <p class="text-immogray3 text-sm align-baseline mb-4">
                <i class="fa fa-clock-o"></i> {{ $activity->created_at->diffForHumans(); }}
            </p>
            <span class="text-xs inline-block py-1 px-2.5 leading-none
            text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white">
                Model: {{ $activity->subject_type }}
            </span><br>
            <span class="text-xs inline-block py-1 px-2.5 leading-none
            text-center whitespace-nowrap align-baseline font-bold bg-red-800 text-white">
                Log: {{ $activity->log_name }}
            </span>
        </div>
        <div class="w-full md:w-1/2 xl:w-9/12 p-6">
            <div class="overscroll-contain w-full">
                <table class="border-none table-fixed">
                    <thead>
                        <tr class="bg-immopurple text-white">
                            <th scope="col" class="text-sm font-medium text-gray-900 text-left">
                                {{ __('activities.th_attribute') }}
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 text-left">
                                {{ __('activities.th_old') }}
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 text-left">
                                {{ __('activities.th_new') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objectKeys as $key)
                        <tr class="border-b {{$loop->odd ? 'bg-white ' : 'bg-immogray2'}}">
                            <td class="text-md text-gray-400 px-1 py-2">
                                {{ $key }}
                            </td>
                            <td class="text-sm text-red-600 px-1 py-2">
                                {!! $activity->properties['old'][$key] !!}
                            </td>
                            <td class="text-sm text-blue-600 px-1 py-2">
                                {!! $activity->properties['attributes'][$key] !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr class="my-4 mx-auto w-48 h-1 bg-immogray2 rounded border-0 md:my-10">
    <h2 class="text-2xl ml-6 text-immopurple">{{ __('activities.other_changes')}}</h2>
    @forelse($activities as $key => $activity)
        <div
            class="flex my-2 flex-wrap border-r border-l-3 bg-immogray1 border-l-4 border-immopurple"
            style="overflow: hidden; max-height: 40vh">
            <div class="w-full md:w-1/2 xl:w-3/12 p-6">
                <p>
                    <strong>{{ __('activities.action_'.$activity->event.'_by') }}</strong>
                    {{$activity?->causer?->full_name ?? 'pas definit'}}
                </p>
                <p class="text-immogray3 text-sm align-baseline mb-4">
                    <i class="fa fa-clock-o"></i> {{ $activity->created_at->diffForHumans(); }}
                </p>
                <span class="text-xs inline-block py-1 px-2.5 leading-none
            text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white">
                Model: {{ $activity->subject_type }}
            </span><br>
                <span class="text-xs inline-block py-1 px-2.5 leading-none
            text-center whitespace-nowrap align-baseline font-bold bg-red-800 text-white">
                Log: {{ $activity->log_name }}
            </span>
                <div>
                    <a href="{{ route('bo.activities.show', [$subjectType, $activity->subject_id,
                    $activity->id, ]) }}">
                        <i class="fa fa-eye"></i> {{ __('activities.see_logs') }}
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-9/12 p-6">
                <div class="overscroll-contain w-full">
                    <table class="border-none table-fixed">
                        <thead>
                        <tr class="bg-immopurple text-white">
                            <th scope="col" class="text-sm font-medium text-gray-900 text-left">
                                {{ __('activities.th_attribute') }}
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 text-left">
                                {{ __('activities.th_new') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($objectKeys as $key)
                        <tr class="border-b {{$loop->odd ? 'bg-white ' : 'bg-immogray2'}}">
                            <td class="text-md text-gray-400 px-1 py-2">
                                {{ $key }}
                            </td>
                            <td class="text-sm text-blue-600 px-1 py-2">
                                {!! $activity->properties['attributes'][$key] !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <h3>No entry</h3>
    @endforelse
@endsection
