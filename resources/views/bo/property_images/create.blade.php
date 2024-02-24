@extends('layouts.tw_admin_v2')

@section('page-title')
    {{__("Gestion des images du bien {$property->name}")}}
@endsection
@section('content')


<div class="w-full px-8 py-4 mx-auto">
    <x-form-error />
    <a href="{{route('bo.properties.index')}}"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-arrow-circle-left"></i> Retour à la liste
    </a>
    <a href="{{route('bo.properties.show', $property)}}"
       class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-none">
        <i class="fa fa-eye"></i> Voir le bien
    </a>
    <div class="w-full mx-auto mt-4 bg-immogray1 py-2.5 px-8">
        <form action="{{route('bo.property_images.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="property_id" id="property_id" value="{{$property->id ?? 0}}" />
            {{Aire::file('images[]', 'Charger une images')
                ->multiple()
                ->helpText(__("properties.upload_image_helptext"));
            }}
            <!-- <input id="file" type="file" name="image" accept="image/jpeg,image/gif,image/png"> -->
            <div class="flex justify-end w-100 items-end border-t-2 border-immogray2 pt-6">
                <button class="mx-2 px-6 py-2.5 bg-green-600 text-white font-medium text-xs rounded-none shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out" aria-label="Enregistrer">
                {!!__('common_terms.save')!!} <i class="fa fa-arrow-right"></i> </button>
            </div>
        </form>
    </div>
</div>
<div class="container grid grid-cols-3 gap-2 mx-auto my-3">
    @forelse($property->images as $image)
        <div class="w-full rounded relative">
            <img src="{{$image->url}}" alt="---">
            {{Aire::open()->route('bo.property_images.destroy', $image)->addClass('image-actions')}}
                <a href="{{ route('bo.property_images.set_default', $image) }}" title="Utiliser cette image comme image par défaut"
                    class="inline-block px-2.5 py-1 bg-blue-{{$image->is_default === 1 ? '100' : '600'}} text-white
                    font-small text-xs leading-tight uppercase rounded-none shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0">
                        <i class="fa fa-image"></i> Image par default
                </a>
                <button type="submit"
                    class="inline-block px-2.5 py-1 bg-red-600 text-white font-small text-xs leading-tight uppercase
                    rounded-none shadow-md hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0" aria-label="Supprimer l'image">
                        <i class="fa fa-trash"></i> Supprimer l'image
                </button>
            {{Aire::close()}}
        </div>
    @empty
</div>
<div class="container">
    <h1 class="text-center text-4xl text-uppercase text-immogray2">{{ __('properties.no_image') }}</h1>
</div>
    @endforelse
@endsection
