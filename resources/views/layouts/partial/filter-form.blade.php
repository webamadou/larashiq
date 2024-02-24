<?php
use \App\Models\Acquisition;
?>
<div id="properties-filter-wrapper">
    <form class="row needs-validation d-flex justify-content-center">
        @csrf
        @if(empty($filterFields) || in_array('acquisition', $filterFields))
            <div class="col-md-3 my-0 justify-content-end d-flex">
                <div class="pretty p-switch p-fill p-primary">
                    <input type="radio"
                           wire:model="acquisitionType"
                           value="{{Acquisition::RENTING}}"
                        {{$acquisition == Acquisition::RENTING ? 'checked' : ''}}/>
                    <div class="state p-success">
                        <label>{{Acquisition::getOptions()[Acquisition::RENTING]}}</label>
                    </div>
                </div>

                <div class="pretty p-switch p-fill p-primary">
                    <input type="radio"
                           wire:model="acquisitionType"
                           value="{{Acquisition::SALE}}"
                        {{$acquisition == Acquisition::SALE ? 'checked' : ''}}/>
                    <div class="state p-success">
                        <label>{{Acquisition::getOptions()[Acquisition::SALE]}}</label>
                    </div>
                </div>
            </div>
        @endif
        @if(empty($filterFields) || in_array('localisation', $filterFields))
        <div class="col-md-3 my-0">
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
        @endif
        @if(empty($filterFields) || in_array('budget', $filterFields))
        <div class="col-md-3 my-0">
            <div class="input-group mb-3">
                <input
                    type="text"
                    class="form-control"
                    placeholder="budget min"
                    aria-label="budget min"
                    name="budgetMin"
                    wire:model="budgetMin"
                />
                <span class="input-group-text"><span class="mdi mdi-arrange-send-to-back"></span></span>
                <input
                    type="text"
                    class="form-control"
                    placeholder="budget max"
                    aria-label="budget max"
                    name="budgetMax"
                    wire:model="budgetMax"
                />
            </div>
        </div>
        @endif
        @if(empty($filterFields) || in_array('surface', $filterFields))
        <div class="col-md-3 my-0">
            <div class="input-group mb-3">
                <input
                    type="number"
                    class="form-control"
                    placeholder="surface min"
                    aria-label="surface min"
                    wire:model="surfaceMin"
                    value="{{$surfaceMin}}"
                />
                <span class="input-group-text"><span class="mdi mdi-arrange-send-to-back"></span></span>
                <input
                    type="number"
                    class="form-control"
                    placeholder="surface max"
                    aria-label="surface max"
                    wire:model="surfaceMax"
                    value="{{$surfaceMax}}"
                />
            </div>
        </div>
        @endif
        @if(empty($filterFields) || in_array('property_type', $filterFields))
        <div class="col-md-9 my-0 d-flex justify-content-between align-items-center">
            <div class="col-12 row">
                <div class="col-6">
                    <div class="input-group">
                        <span class="input-group-text"><span class="mdi mdi-apple-keyboard-option"></span></span>
                        <select class="form-control rounded-0"
                                data-aire-component="select"
                                name="property_type_id"
                                wire:model="propertyType"
                                aria-label="{{ __('front.label_property_type') }}"
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
                            aria-label="{{ __('front.label_property_type') }}"
                    >
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
        @endif
        @if(empty($filterFields) || in_array('furnished', $filterFields))
        <div class="col-md-3 my-0 d-flex">
            <div class="input-group">
                <span class="input-group-text"><span class="mdi mdi-sofa-outline"></span></span>
                <select class="form-control" name="furnished" id="furnished" wire:model="furnished" aria-label="Biens Meublés">
                    <option value="0"> Meublés et non meublés </option>
                    <option value="2"> Meublés </option>
                    <option value="1"> Non Meublés </option>
                </select>
            </div>
        </div>
        @endif
        <div class="col-md-3 my-0 offset-md-6 col-sm">
            <div class="input-group mb-3 d-flex justify-content-end">
                <select class="form-control" wire:model="orderColumn" id="orderColumn">
                    <option value="">{{__('front.order_by')}}</option>
                    <option value="name" {{$orderColumn == 'name' ? 'selected' : ''}}>{{__('front.order_by_name')}}</option>
                    <option value="generate_total_cost"
                        {{$orderColumn == 'generate_total_cost' ? 'selected' : ''}}>{{__('front.order_by_budget')}}</option>
                    <option value="total_surfaces"
                        {{$orderColumn == 'total_surfaces' ? 'selected' : ''}}>{{__('front.order_by_surface')}}</option>
                </select>
                <select class="form-control" wire:model="orderDirection" id="orderDirection">
                    <option value="asc" {{$orderDirection == 'asc' ? 'selected' : ''}}> {!!__('front.order_to_asc')!!}</option>
                    <option value="desc" {{$orderDirection == 'desc' ? 'selected' : ''}}>{!!__('front.order_to_desc')!!}</option>
                </select>
                <span class="input-group-text"><span class="mdi mdi-sort order-0"></span></span>

                @if(! $liveLoading)
                <button type="submit" class="btn btn-primary rounded-0 ms-1" aria-label="Filtrer">
                    <span class="mdi mdi-filter-settings"></span> {{__('front.filter')}}
                </button>
                <a href="{{$baseUrl}}"
                   type="reset"
                   class="btn btn-success rounded-0 ms-2 {{$filtering ? '' : 'd-none'}}"
                   wire:click="resetFilter"
                   style="color: #ffffff"
                >
                    <span class="mdi mdi-reload"></span> {{__('front.reset')}}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
