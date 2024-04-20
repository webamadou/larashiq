@extends('layouts.tw_admin_v2')

@section('page-title')
    Modification de la catalogue {{$catalogue->name}}
@endsection
@section('content')
<h1 class="text-2xl"></h1>
<x-form-error />
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.catalogues.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-arrow-circle-left"></i> {{ __('common_terms.backToList') }}</a>
    <div class="w-full mx-auto bg-immogray1 py-2.5 px-8">
        <form action="{{route('bo.catalogues.update', $catalogue)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="catalogue_id" id="catalogue_id" value="{{$catalogue->id ?? 0}}" />
            {{ Aire::input('name', "Le titre du catalogue*")
                ->id('name')
                ->required()
                ->type('text')
                ->value(old('name', $catalogue->name))
                ->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
                }}
            {{ Aire::input('pdf_file_url', "l'URL du PDF à télécharger*")
                ->id('pdf_file_url')
                ->required()
                ->type('url')
                ->value(old('pdf_file_url', $catalogue->pdf_file_url))
                ->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
                }}
            <div class="flex justify-end w-100 items-end border-t-2 border-immogray2 pt-6">
                <button class="mx-2 px-6 py-2.5 bg-green-600 text-white font-medium text-xs rounded-none" aria-label="Enregistrer">
                {!!__('common_terms.save')!!} <i class="fa fa-arrow-right"></i> </button>
            </div>
        </form>
    </div>
</div>

@endsection
