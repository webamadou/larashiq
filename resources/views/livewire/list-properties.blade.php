<div class="row justify-content-center prop-vignettes-wrapper {{$carousel ? 'with-carousel' : ''}}">
    <div id="{{$carouselId}}" class="{{$carousel ? 'owl-carousel' : ''}}">
        @foreach($properties as $key => $property)
            <livewire:property-vignette wire:key="$key" :property="$property" :carousel="$carousel" lazy/>
        @endforeach
    </div>
</div>
