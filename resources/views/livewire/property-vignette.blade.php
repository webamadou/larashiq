<div class="{{ $withMap ? 'col-lg-6 col-md-12 col-sm-12' : 'col-lg-4 col-md-6 col-sm-12' }}
 position-relative prop-vignette-wrapper pb-4
  {{$carousel ? 'w-100 px-2' : ''}}"
>
    <div class="prop-vignette">
        <div class="acquisition-label-wrapper d-flex justify-content-end">
            <span class="acquisition-label-{{$property->acquisition_type}} badge btn btn-primary rounded-0 rounded-0">
                {{__('front.acquisition'.$property->acquisition_type)}}
            </span>
        </div>
        <div class="prop-vignette-body-wrapper">
            <a href="{{route('show-property', $property->slug)}}" class="prop-image d-block"
            style="background: url({{asset($property->getDefaultImage())}});
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;"
                aria-label="Image du bien">
                <span class="title-price">
                    <span class="title">
                        {{Str::words($property->name, 15, '...')}}
                    </span>
                </span>
            </a>
            <ul class="prop-badges">
                @if ($property->embedded_url != '')
                    <li class="bg-red-600 bg-immopurple">Visite Virtuelle</li>
                @endif
            </ul>
            <ul class="prop-metas">
                 <li>
                    <a href="{{ route('show-property', $property->slug)}}" aria-label="Images du bien">
                        <span class="mdi mdi-camera-outline"></span> {{$property->getNbrImages()}}
                    </a>
                </li>
            </ul>
        </div>
        <div class="prop-vignette-footer-wrapper">
            <div class="property-details-wrapper">
                <ul class="property-details">
                    @if(! $property->nbr_lounge_rooms && $property->total_surfaces)
                    <li>
                        <span class="mdi mdi-bed"></span>
                        {{$property->total_surfaces}} {!! __('front.total_surface') !!}
                    </li>
                    @endif
                    @if($property->nbr_lounge_rooms)
                    <li>
                        <span class="mdi mdi-bed"></span>
                        {{$property->nbr_lounge_rooms}}{{trans_choice('front.lounge_rooms', $property->nbr_lounge_rooms)}}
                    </li>
                    @endif
                    @if($property->nbr_bedrooms)
                    <li>
                        <span class="mdi mdi-bed-outline"></span> {{$property->nbr_bedrooms}}
                        {{trans_choice('front.bed_rooms', $property?->nbr_bedrooms)}}
                    </li>
                    @endif
                    @if($property->nbr_kitchens)
                    <li>
                        <span class="mdi mdi-faucet-variant"></span> {{$property->nbr_kitchens}}
                        {{trans_choice('front.kitchens', $property?->nbr_kitchens)}}
                    </li>
                    @endif
                    @if($property->nbr_bathrooms)
                    <li>
                        <span class="mdi mdi-shower"></span> {{$property->nbr_bathrooms}}
                        {{trans_choice('front.bathrooms', $property?->nbr_bathrooms)}}
                    </li>
                    @endif
                </ul>
            </div>
            <div class="map-center address" data-coordinate="{{$property->pin?->longitude}}, {{$property->pin?->latitude}}">
                <span class="mdi mdi-map-marker-radius"></span>
                {{! empty($property->localisation?->name) ? $property->localisation?->name.' - ' : ''}}
                {{! empty($property->city?->name) ? $property->city?->name.' - ' : ''}}
                {{! empty($property->country?->name) ? $property->country?->name : ''}}
            </div>
            <div class="actions-wrapper">
                @livewire('add-to-favorite', ['property' => $property])
                @if ($property->generate_total_cost > 0 )
                    <div class="price price-format">
                        <a href="{{route('show-property', $property->slug)}}">
                            @formatMoney($property->generate_total_cost)
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
