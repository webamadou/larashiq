<?php
use \App\Models\Acquisition;
?>
<section class="long-height position-relative py-0">
    <div class="container" id="properties-filter-wrapper">
        <form class="row g-3 needs-validation d-flex justify-content-center"  action="{{route('search-prop')}}">
            @csrf
            <div class="col-md-4">
                <div class="pretty p-switch p-fill p-primary">
                    <input type="radio"
                           value="{{Acquisition::RENTING}}"
                           wire:model="acquisitionType"
                    />
                    <div class="state p-success">
                        <label>{{Acquisition::getOptions()[Acquisition::RENTING]}}</label>
                    </div>
                </div>

                <div class="pretty p-switch p-fill p-primary">
                    <input type="radio"
                           value="{{Acquisition::SALE}}"
                           wire:model="acquisitionType"
                    />
                    <div class="state p-success">
                        <label>{{Acquisition::getOptions()[Acquisition::SALE]}}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-4 col-sm">
                <div class="input-group mb-3 d-flex justify-content-end">
                    <span class="input-group-text"><span class="mdi mdi-sort order-0"></span></span>
                    <select class="form-control" wire:model="orderColumn" aria-label="Ordonner par...">
                        <option value="" disabled>{{__('front.order_by')}}</option>
                        <option value="created_at">{{__('front.order_by_created_at')}}</option>
                        <option value="name">{{__('front.order_by_name')}}</option>
                        <option value="generate_total_cost">{{__('front.order_by_budget')}}</option>
                        <option value="total_surfaces">{{__('front.order_by_surface')}}</option>
                    </select>
                    <select class="form-control" wire:model="orderDirection" aria-label="Ordre direction">
                        <option value="desc">{!!__('front.order_to_desc')!!}</option>
                        <option value="asc"> {!!__('front.order_to_asc')!!}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
<!--                @ livewire('input-search-localisation', ['localisationInputedName' => $localisationName ?? ''])-->
                <div class="position-relative relative">
                    <div class="input-group mb-3">
                        <input type="text"
                               name="localisation"
                               class="form-control"
                               placeholder="localisation"
                               aria-label="localisation"
                               aria-describedby="basic-addon1"
                               wire:model="localisationInputedName"
                               wire:keyup="triggerSearch"
                        >
                        <span class="input-group-text hidden rounded-0" id="basic-addon1"><span class="mdi mdi-google-maps"></span></span>
                    </div>
                    <div id="localisation-results"
                         class="animate__animated {{$showSuggestion ? 'animate__zoomIn' : 'animate__zoomOut d-none hidden'}}">
                        <div class="close-localisation-results" wire:click="closeResults"><span class="window-close">X</span></div>
                        <ul>
                            @forelse($cities as $key => $city)
                                <li class="px-6 py-1 pl-10 border-b border-immogray2 w-full rounded-none text-xs cursor-pointer
                {{!$loop->odd ? 'bg-immogray1' : 'bg-immogray2'}}"
                                    wire:model="localisationInputedName"
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
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="budget min"
                        aria-label="budget min"
                        wire:model="budgetMin"
                    />
                    <span class="input-group-text"><span class="mdi mdi-arrange-send-to-back"></span></span>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="budget max"
                        aria-label="budget max"
                        wire:model="budgetMax"
                    />
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input
                        type="number"
                        class="form-control"
                        placeholder="surface min"
                        aria-label="surface min"
                        wire:model="surfaceMin"
                    />
                    <span class="input-group-text"><span class="mdi mdi-arrange-send-to-back"></span></span>
                    <input
                        type="number"
                        class="form-control"
                        placeholder="surface max"
                        aria-label="surface max"
                        wire:model="surfaceMax"
                    />
                </div>
            </div>
            <div class="col-md-7 d-flex justify-content-between align-items-center">
                <div class="col-12 row">
                    <div class="col-6">
                        <div class="input-group">
                            <span class="input-group-text"><span class="mdi mdi-apple-keyboard-option"></span></span>
                            <select class="form-control rounded-0"
                                    data-aire-component="select"
                                    name="property_type_id"
                                    wire:model="propertyType"
                                    aria-label="Type de bien"
                            >
                                <option value="0">{{ __('front.label_property_type') }}</option>
                                @foreach($parents as $id => $parent)
                                    <option value="{{$id}}"
                                            wire:key="{{$id}}">
                                        {{$parent}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="{{$hasChildren ? '' : 'd-none'}} col-6">
                        <select class="form-control rounded-0"
                                data-aire-component="select"
                                name="property_type_child_id"
                                wire:model="propertyTypeChild"
                                aria-label="Sous type de bien"
                        >
                            <option value="" disabled> - Précisez le sous type - </option>
                            @foreach($children as $id => $child)
                                <option value="{{$id}}"
                                        wire:key="{{$id}}">
                                    {{$child}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-baseline justify-content-end">
                <div class="input-group">
                    <span class="input-group-text"><span class="mdi mdi-sofa-outline"></span></span>
                    <select name="furnished" id="furnished" wire:model="furnished" aria-label="Biens Meublés">
                        <option value="0"> Meublés et non meublés </option>
                        <option value="2"> Meublés </option>
                        <option value="1"> Non Meublés </option>
                    </select>
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-baseline justify-content-end">
                <!--<button type="submit" class="btn btn-primary rounded-0" aria-label="{{__('front.filter')}}">
                    <span class="mdi mdi-filter-settings"></span> {{__('front.filter')}}
                </button>-->
                <button
                    type="reset"
                    class="btn btn-success rounded-0 ms-2 {{$filtering ? '' : 'd-none'}}"
                    wire:click="resetFilter"
                    aria-label="{{__('front.reset')}}"
                >
                    <span class="mdi mdi-reload"></span> {{__('front.reset')}}
                </button>
            </div>
        </form>
    </div>

    <div wire:loading>
        <div class="d-flex justify-content-center py-2 text-immo-primary"
             style="    width: 100%; position: absolute; z-index: 99999999; top: 25%;"
        >
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center prop-vignettes-wrapper py-4">
            @forelse($properties as $key => $property)
                @include('partials.property-vignette-array')
            @empty
                @include('layouts.partial.no-property-found')
            @endforelse
        </div>
        <div class="row">
            @if (! empty(count($properties)) && count($properties) % $perPage === 0)
                <button wire:click="loadMore" class="btn btn-primary rounded-0 btn-sm">Voir plus <i class="mdi mdi-plus"></i></button>
            @else
                <p class="text-center">-</p>
            @endif
        </div>
    </div>
</section>
