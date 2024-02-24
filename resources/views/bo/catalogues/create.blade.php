@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__('Ajouter un catalogue')}}
@endsection
@section('content')
<div class="w-full px-8 py-4 mx-auto">
    <a href="{{route('bo.catalogues.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste
    </a>

    <div class="w-full mx-auto bg-immogray1 py-2.5 px-8">
        <form action="{{route('bo.catalogues.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="catalogue_id" id="catalogue_id" value="{{$catalogue->id ?? 0}}" />
            {{ Aire::input('name', "Le titre du catalogue*")
                ->id('name')
                ->required()
                ->type('text')
                ->value(old('name', $catalogue->name))
                ->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
                }}
            {{Aire::file('images[]', 'Charger une images')
                ->multiple()
                ->helpText(__("properties.upload_image_helptext"));
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