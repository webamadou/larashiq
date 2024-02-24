@extends('layouts.tw_admin_v2')

@section('page-title')
    Modification du bien {{$property->name}}
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.properties.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none
       shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none
       focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste
    </a>

    <div class="w-full mx-auto mt-4 bg-immogray1 py-2.5 px-8">
        <ul class="stepper" data-mdb-stepper="stepper">
            @for($i=1; $i < 6; $i++)
            <li class="stepper-step {{$step == $i ? 'stepper-active': ''}}">
                <div class="stepper-head">
                    <span class="stepper-head-icon"> {{$i}} </span>
                    <span class="stepper-head-text"> <strong>{{$stepsTitles[$i]}}</strong> </span>
                </div>
                <div class="stepper-content"> </div>
            </li>
            @endfor
        </ul>
        {{ Aire::open()->route('bo.properties.update', $property)}}
            {{ Aire::input('step', '')
                ->id('step')
                ->required()
                ->type('hidden')
                ->value(old('step', $step))
            }}
            {{ Aire::input('id', '')
                ->id('id')
                ->required()
                ->type('hidden')
                ->value(old('id', $property->id))
            }}
            @include("bo.properties.air_form_$step")
            <div class="flex justify-end w-100 items-end border-t-2 border-immogray2 pt-6">
                @if($step > 1)
                    <a href="{{ route('bo.properties.create', $step - 1 ) }}" type='submit' class="mx-2 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs rounded-none shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                    <i class="fa fa-arrow-left"></i> {!!__('common_terms.previous')!!} </a>
                @endif
                <button class="mx-2 px-6 py-2.5 bg-green-600 text-white font-medium text-xs rounded-none shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out" aria-label="Enregistrer">
                @if($step == 5)
                    {!!__('common_terms.save')!!}
                    @else
                    {!!__('common_terms.next')!!} <i class="fa fa-arrow-right"></i>
                @endif
            </button>
            </div>
        {{ Aire::close() }}
    </div>
</div>
@endsection
