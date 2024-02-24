<div class="container-fluid">
    <div id="steps-wrapper">
        <div class="progress" role="progressbar" aria-label="Form Steps" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{($currentStep * 100)/$maxSteps}}%">{{"Étape $currentStep sur $maxSteps"}}</div>
        </div>
    </div>
    <div class="row"
         style="height: 87vh;
            background: url('{{asset ('images/illustration_0.png')}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top left;
            height: inherit;
            transition: all ease-in-out .8s;">
        <div class="col-md-6 d-md-block d-sm-none image-illustration">
        </div>
        <div class="col-md-6 col-sm-12 form-steps-wrapper tab-content" id="myTabContent">
            <div class="form-steps-container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade{{$currentStep === 1 ? ' show active' : ''}}" id="step1" role="tabpanel"
                         aria-labelledby="home-tab">
                        <div style="height: 40vh">
                            <div class="form-elements">
                                <h5 class="alert-section-title">
                                <span class="mdi mdi-map-marker-radius"> Vous recherchez un bien en ?
                                </h5>
                                @error('acquisition') <span class="error alert-errors">{{ $message }}</span> @enderror
                                <div class="options-wrapper">
                                    @foreach($formData['acquisitionOptions'] as $id => $name)
                                    <div class="pretty p-switch p-fill">
                                        <input class="form-check-input"
                                               type="radio"
                                               wire:model="acquisition"
                                               id="acquisition{{$id}}"
                                               value="{{$id}}">
                                        <div class="state p-success">
                                            <label class="form-check-label" for="acquisition{{$id}}">{{$name}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-elements">
                                <h5 class="alert-section-title"><span class="mdi mdi-home-city"></span> Quel(s) type(s) de bien ?</h5>
                                @error('propertyTypes') <span class="error alert-errors">{{ $message }}</span> @enderror
                                <div class="options-wrapper row">
                                    @foreach($formData['propertyTypesOptions'] as $id => $name)
                                    <div class="pretty p-icon p-curve col-5">
                                        <input class="form-check-input" type="checkbox" wire:model="propertyTypes"
                                               id="propertyType{{$id}}"
                                               value="{{$id}}">
                                        <div class="state p-primary">
                                            <i class="icon mdi mdi-check-all"></i>
                                            <label class="form-check-label" for="propertyType{{$id}}">{{$name}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 2 ? ' show active' : ''}}" id="step2" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="form-elements">
                            <div class="form-elements">
                                <h5 class="alert-section-title"><span class="mdi mdi-map-marker-radius"></span> Dans quel(s) zone</h5>
                                <div class="input-group mb-3">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="localisation"
                                           aria-label="localisation"
                                           aria-describedby="basic-addon1"
                                           wire:model="localisations"
                                           wire:keyup="triggerSearch">
                                    <span class="input-group-text" id="basic-addon1"><span class="mdi mdi-google-maps"></span></span>
                                </div>
                                @error('localisations')<div class="alert alert-errors">{{ $message }}</div>@enderror
                                <div id="localisation-results" class="animate__animated {{$showSuggestion ? 'animate__slideInDown' : 'animate__slideOutDown d-none'}}">
                                    <div class="close-localisation-results"><span class="window-close"></span></div>
                                    <ul>
                                        @forelse($cities as $key => $city)
                                        <li class="px-6 py-1 pl-10 border-b border-immogray2 w-full rounded-none text-xs cursor-pointer
                {{!$loop->odd ? 'bg-immogray1' : 'bg-immogray2'}}"
                                            wire:model="inputValue"
                                            wire:key="{{$key}}"
                                            wire:click.prevent="setNewValue('{{$city}}')"
                                        > {{$city}} </li>
                                        @empty
                                        <li class="px-6 py-1 pl-10 border-b border-immogray2 w-full rounded-none text-xs text-immogray3">
                                            Aucun resultat
                                        </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 3 ? ' show active' : ''}}" id="step3" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <div class="form-elements">
                            @error('budget_min')<div class="alert alert-errors">{{ $message }}</div>@enderror
                            @error('budget_max')<div class="alert alert-errors">{{ $message }}</div>@enderror
                            <h5 for="" class="alert-section-title">
                                <span class="mdi mdi-cash-multiple"></span> Votre budget *
                            </h5>
                            <div class="input-group mb-5">
                                <span class="input-group-text">Min</span>
                                <input
                                    type="number"
                                    class="form-control"
                                    wire:model="budget_min"
                                    wire:change="updateBudget('budget_min', $event.target.value)"
                                >
                                <span class="input-group-text">Max</span>
                                <input
                                    type="number"
                                    class="form-control"
                                    wire:model="budget_max"
                                    wire:change="updateBudget('budget_max', $event.target.value)"
                                >
                            </div>

                            @error('rooms_min')<div class="alert alert-errors">{{ $message }}</div>@enderror
                            @error('rooms_max')<div class="alert alert-errors">{{ $message }}</div>@enderror
                            <h5 for="" class="alert-section-title"><span class="mdi mdi-sofa"></span> Combien de pieces
                                souhaitez-vous?</h5>
                            <div class="input-group mb-5">
                                <span class="input-group-text">Min</span>
                                <input type="number"
                                       class="form-control"
                                       wire:model="rooms_min" min="0">
                                <span class="input-group-text">Max</span>
                                <input type="number"
                                       class="form-control"
                                       wire:model="rooms_max" min="0">
                            </div>

                            @error('surface_min')<div class="error alert-errors">{{ $message }}</div>@enderror
                            @error('surface_max')<div class="error alert-errors">{{ $message }}</div>@enderror
                            <h5 for="" class="alert-section-title">
                                <span class="mdi mdi-floor-plan"></span>
                                La surface de votre bien ?
                            </h5>
                            <div class="input-group mb-5">
                                <span class="input-group-text">Min</span>
                                <input type="number" class="form-control" wire:model="surface_min" min="0">
                                <span class="input-group-text">Max</span>
                                <input type="number" class="form-control" wire:model="surface_max" min="0">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 4 ? ' show active' : ''}}"
                        id="step4"
                        role="tabpanel"
                        aria-labelledby="profile-tab">
                        <div class="form-elements">
                            @error('bed_rooms_min')<div class="error alert-errors">{{ $message }}</div>@enderror
                            @error('bed_rooms_max')<div class="error alert-errors">{{ $message }}</div>@enderror
                            <h5 for="" class="alert-section-title"><span class="mdi mdi-numeric-6-box-multiple"></span> Nombre de chambre -
                                (facultatif)</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Min</span>
                                <input type="number" class="form-control" wire:model="bed_rooms_min" min="0">
                                <span class="input-group-text">Max</span>
                                <input type="number" class="form-control" wire:model="bed_rooms_max" min="0">
                            </div>
                            @error('floor_min')<div class="error alert-errors">{{ $message }}</div>@enderror
                            @error('floor_max')<div class="error alert-errors">{{ $message }}</div>@enderror
                            <h5 for="" class="alert-section-title"><span class="mdi mdi-home-floor-3"></span> Étage souhaité - (facultatif)</h5>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Min</span>
                                <input type="number" class="form-control" wire:model="floor_min" min="0">
                                <span class="input-group-text">Max</span>
                                <input type="number" class="form-control" wire:model="floor_max" min="0">
                            </div>
                            <h5 for="commodities" class="alert-section-title"><span class="mdi mdi-page-layout-sidebar-right"></span> Amenagement - (facultatif)</h5>
                            <div class="options-wrapper row mb-5">
                                @foreach($formData['commodities'] as $id => $name)
                                <div class="pretty p-icon p-curve col-md-4 col-sm-12 mx-sm-4">
                                    <input class="form-check-input" type="checkbox" wire:model="commodities"
                                           id="commodity{{$id}}"
                                           value="{{$id}}">
                                    <div class="state p-primary">
                                        <i class="icon mdi mdi-check-all"></i>
                                        <label class="form-check-label" for="commodity{{$id}}">
                                            <span class="mdi {{$formData['commoditiesIcons'][$id]}}"></span>
                                            {{$name}}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 5 ? ' show active' : ''}}" id="step5" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <div class="form-elements">
                            <h5 for="$frequency" class="alert-section-title">
                                <span class="mdi mdi-calendar-refresh"></span> Frequence
                            </h5>
                            <p class="alert-section-description">À quelle fréquence souhaitez-vous recevoir des alertes</p>
                            @error('frequency')<div class="error alert-errors">{{ $message }}</div>@enderror
                            @foreach($formData['frequencies'] as $id => $name)
                            <div class="pretty p-switch p-fill col-6">
                                <input class="form-check-input"
                                       type="radio"
                                       wire:model="frequency"
                                       id="frequency{{$id}}"
                                       value="{{$id}}">
                                <div class="state p-success">
                                    <label class="form-check-label" for="frequency{{$id}}">{{$name}}</label>
                                </div>
                            </div>
                            @endforeach
                            <div class="my-5"></div>
                            @error('user_email')<div class="error alert-errors">{{ $message }}</div>@enderror
                            <h5 for="" class="alert-section-title">
                                <span class="mdi mdi-at"></span> L'adresse e-mail de reception de l'alerte *
                            </h5>
                            <div class="input-group mb-3">
                                <input type="email"
                                       class="form-control"
                                       wire:model="user_email"
                                       {{ auth()->user()?->email ? 'disabled' : '' }}
                                >
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 6 ? ' show active' : ''}}" id="step5" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <h5 class="alert-section-title">{{__('common_terms.alerte_summary')}}</h5>
                        <div class="form-elements pt-1 m-0">
                            {!! __('front.your_alert_acquisition_'.$acquisition) !!}
                            @if (count($propertyTypes)  == 1)
                                <strong>{{__('front.property_type_'.$propertyTypes[0])}}</strong>
                            @else
                            @foreach($propertyTypes as $propertyType => $name)
                                @if ($loop->first && count($propertyTypes) > 2)
                                    <strong>{{ $formData['propertyTypesOptions'][$name] }}</strong>,
                                @elseif ($loop->last && count($propertyTypes) > 1)
                                    <strong>
                                        {{__('front.or')}}
                                        {{$formData['propertyTypesOptions'][$name]}}
                                    </strong>
                                @else
                                    <strong>{{ $formData['propertyTypesOptions'][$name] }}</strong>,
                                @endif
                            @endforeach <br>
                            @endif
                        </div>
                        <div class="form-elements pt-1 m-0">
                            @if (!empty($budget_min) && !empty($budget_max))
                            {!!__('front.alert_min_max_budget', ['min' => $budget_min, 'max' => $budget_max])!!} FCFA.
                            @elseif(!empty($budget_min))
                            {!!__('alert_min_budget',['min' => $budget_min])!!} FCFA.
                            @elseif(!empty($budget_max))
                            {!!__('alert_max_budget', ['max' => $budget_max])!!} FCFA.
                            @endif
                        </div>
                        @if(!empty($rooms_min) || !empty($rooms_max))
                        <div class="form-elements pt-1 m-0">
                            @if (!empty($rooms_min) && !empty($rooms_max))
                            {!!__('front.alert_min_max_rooms', ['min' => $rooms_min, 'max' => $rooms_max])!!}
                            @elseif(!empty($rooms_min))
                            {!!__('front.alert_min_rooms',['min' => $rooms_min])!!}
                            @elseif(!empty($rooms_max))
                            {!!__('front.alert_max_rooms', ['max' => $rooms_max])!!}
                            @endif
                            @if (!empty($bed_rooms_min) || !empty($bed_rooms_max))
                            @if (!empty($bed_rooms_min) && !empty($bed_rooms_max))
                            {!!__('front.alert_min_max_bed_rooms', ['min' => $bed_rooms_min, 'max' => $bed_rooms_max])!!}
                            @elseif(!empty($bed_rooms_min))
                            {!!__('front.alert_min_bed_rooms',['min' => $bed_rooms_min])!!}
                            @elseif(!empty($bed_rooms_max))
                            {!!__('front.alert_max_bed_rooms', ['max' => $bed_rooms_max])!!}
                            @endif
                            @endif
                        </div>
                        @endif
                        @if(!empty($surface_min) || !empty($surface_max))
                        <div class="form-elements pt-1 m-0">
                            @if (!empty($surface_min) && !empty($surface_max))
                            {!!__('front.alert_min_max_surface', ['min' => $surface_min, 'max' => $surface_max])!!}
                            @elseif(!empty($surface_min))
                            {!!__('front.alert_min_surface',['min' => $surface_min])!!}
                            @elseif(!empty($surface_max))
                            {!!__('front.alert_max_surface', ['max' => $surface_max])!!}
                            @endif
                        </div>
                        @endif
                        @if(!empty($floor_min) || !empty($floor_max))
                        <div class="form-elements pt-1 m-0">
                            @if (intval($floor_min) > 0 && (intval($floor_min) == intval($floor_max)))
                            {!!__('front.alert_at_floor', ['max' => $floor_min])!!}
                            @elseif (!empty($floor_min) && !empty($floor_max))
                            {!!__('front.alert_min_max_floor', ['min' => $floor_min, 'max' => $floor_max])!!}
                            @elseif(!empty($floor_min))
                            {!!__('front.alert_min_floor',['min' => $floor_min])!!}
                            @elseif(!empty($floor_max))
                            {!!__('front.alert_max_floor', ['max' => $floor_max])!!}
                            @endif
                        </div>
                        @endif
                        @if(! empty($commodities))
                        <div class="form-elements pt-1 m-0">
                            {{__('front.has_commodity')}}
                            <ul>
                                @foreach($commodities as $commodity)
                                <div class="state p-primary py-1" style="color: var(--immopurple); font-size: 1.1rem;">
                                    <i class="icon mdi mdi-check-all"></i>
                                    <label class="form-check-label" for="commodity{{$id}}">
                                        <span class="mdi {{$formData['commoditiesIcons'][$commodity]}}"></span>
                                        {!! $formData['commodities'][$commodity] !!}
                                    </label>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-elements pt-1 m-0">
                            Vous aimeriez recevoir les alertes <strong>{{__('front.all_'.strtolower($frequency))}}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form-buttons-wrapper" class="form-buttons-wrapper row px-0">
            <div class="col-6 offset-6 row">
                <div class="col-md-6 col-sm-12 justify-content-start d-flex">
                    @if ($currentStep > 1)
                        <button class="btn nextBtn rounded-0" type="button" wire:click="{{$buttons['back']['click']}}" aria-label="Precedant">
                            <span class="mdi {{$buttons['back']['icon']}}"></span> {{$buttons['back']['label']}}
                        </button>
                    @endif
                </div>
                <div class="col-md-6 col-sm-12 justify-content-end d-flex">
                    <button class="btn btn-primary nextBtn rounded-0"
                            type="button"
                            wire:click="{{$buttons['forward']['click']}}" aria-label="Suivant">
                        {{$buttons['forward']['label']}}
                        <span class="mdi {{$buttons['forward']['icon']}}"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
