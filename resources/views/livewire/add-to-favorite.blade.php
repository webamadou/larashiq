<div>
    <a
        class="btn btn-primary btn-favori rounded-0"
        title="{{$isFavorite ? __('front.remove_to_favorites') : __('front.add_to_favorites')}}"
        wire:click.prevent="updateFavorites"
    >
        <span class="mdi {{$isFavorite ? 'mdi-heart-remove' : 'mdi-heart-plus'}}"></span>
        {{$isFavorite ? __('front.remove_to_favorites') : __('front.add_to_favorites')}}
    </a>
</div>
