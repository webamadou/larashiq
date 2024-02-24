<div class="container mx-auto">
    @forelse($property->images as $image)
        <div class="w-full rounded">
            <img src="{{$image->url)}}" alt="image" style="height: 100px; width: auto">
            {{Aire::open()->route('bo.property_images.destroy', $image)}}
                <button type="submit"
                    class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-none
                    shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none
                    focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" aria-label="Supprimer l'image">
                        <i class="fa fa-arrow-circle-left"></i> Supprimer l'image
                </button>
            {{Aire::close()}}
        </div>
    @empty
        <div class="container w-full">
            <h1 class="text-4xl text-center text-immogray2">Aucune image</h1>
        </div>
    @endforelse
</div>
