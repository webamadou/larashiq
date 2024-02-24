<div class="property-details-wrapper">
    <ul class="property-details">
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
