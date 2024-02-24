<div class="position-relative relative">
    <div class="input-group mb-3">
        <input type="text"
               name="localisation"
                class="form-control"
                placeholder="localisation"
                aria-label="localisation"
                wire:model="inputValue"
                wire:keyup="triggerSearch"
            >
        <span class="input-group-text hidden rounded-0"><span class="mdi mdi-google-maps"></span></span>
    </div>
    <div id="localisation-results"
         class="animate__animated {{$showSuggestion ? 'animate__zoomIn' : 'animate__zoomOut d-none hidden'}}">
        <div class="close-localisation-results" wire:click="closeResults"><span class="window-close">X</span></div>
        <ul>
            @forelse($cities as $key => $city)
                <li class="px-6 py-1 pl-10 border-b border-immogray2 w-full rounded-none text-xs cursor-pointer
                {{!$loop->odd ? 'bg-immogray1' : 'bg-immogray2'}}"
                    wire:model="inputValue"
                    wire:key="{{$key}}"
                    wire:click.prevent="setNewValue('{{$city}}')"
                ><span class="mdi mdi-map-marker-radius"></span> {!! $city !!} </li>
            @empty
                <li class="px-6 py-1 pl-10 border-b border-immogray2 w-full rounded-none text-xs text-immogray3">
                    Aucun resultat
                </li>
            @endforelse
        </ul>
    </div>
</div>
