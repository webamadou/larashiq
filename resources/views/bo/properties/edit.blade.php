@extends('layouts.tw_admin_v2')

@section('page-title')
    Modification du bien {{$pvm->property->name}}
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
    <a href="{{route('show-property', $pvm->property->slug)}}"
       class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-none
       shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none
       focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
       target="_blank">
        <i class="fa fa-eye"></i> Voir le bien
    </a>

    <div class="w-full mx-auto mt-4 bg-immogray1 py-2.5 px-8">
        <ul class="stepper" data-mdb-stepper="stepper">
            @for($i=1; $i < 6; $i++)
            <li class="stepper-step {{$step == $i ? 'stepper-active': ''}}">
                <a href="{{route('bo.properties.edit', [$pvm->property, $i])}}" class="stepper-head">
                    <span class="stepper-head-icon"> {{$i}} </span>
                    <span class="stepper-head-text
                    text-immopurple
                    font-light
                     uppercase text-xs">
                        <strong>{{$pvm->stepsTitles[$i]}}</strong> </span>
                </a>
                <div class="stepper-content"> </div>
            </li>
            @endfor
        </ul>
        {{ Aire::open()->route('bo.properties.update', $pvm->property)}}
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
                ->value(old('id', $pvm->property->id))
            }}
            @include("bo.properties.air_form_$step")
            <div class="flex w-full justify-between border-t-2 border-immogray2 pt-6">
                <div class="flex justify-start w-50 items-end">
                    @if($step < 5)
                        {{--<button
                         type='submit' class="mx-2 px-6 py-2.5 bg-blue-600 text-white text-xs rounded-none shadow-md transition duration-150 ease-in-out">
                            {!!__('common_terms.save')!!}
                        </button>--}}
                    @endif
                </div>
                <div class="flex justify-end w-50 items-end">
                    @if($step > 1)
                        <a href="{{ url('backoffice/properties/update/' . $pvm->property->id . '/' . $step - 1 ) }}" type='submit' class="mx-2 px-6 py-2.5 bg-green-600 text-white text-xs rounded-none">
                        <i class="fa fa-arrow-left"></i> {!!__('common_terms.previous')!!} </a>
                    @endif
                    <button class="mx-2 px-6 py-2.5 {{ $step === 5 ? 'bg-blue-600' : 'bg-green-600' }} text-white text-xs rounded-none" aria-label="Enregistrer">
                        {!! $step === 5
                            ? __('common_terms.save')
                            : __('common_terms.next').'<i class="fa fa-arrow-right"></i>' !!}
                    </button>
                </div>
            </div>
        {{ Aire::close() }}
    </div>
</div>
@endsection
