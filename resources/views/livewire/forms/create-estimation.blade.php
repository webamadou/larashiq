<div class="container-fluid">
    <div id="steps-wrapper">
        <div class="progress" role="progressbar" aria-label="Form Steps" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{($currentStep * 100)/$maxSteps}}%">{{"Étape $currentStep sur $maxSteps"}}</div>
        </div>
    </div>
    <div class="row" style="height: 80vh; background: url('{{asset ('images/estimation0.jpeg')}}');
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: center 80%;
                                    height: inherit;
                                    transition: all ease-in-out .8s;">
        <div class="col-md-6 d-md-block d-sm-none image-illustration">
        </div>
        <div class="col-md-6 col-sm-12 form-steps-wrapper tab-content" id="myTabContent">
            <div class="form-steps-container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade{{$currentStep === 1 ? ' show active' : ''}}" id="step1" role="tabpanel"
                         aria-labelledby="home-tab">
                        <h2 class="section_title">Adresse</h2>
                        <div style="height: 40vh">
                            <div class="form-elements">
                                <h3><span class="mdi mdi-map-marker-radius"> {{__('estimations.address_label')}}</h3>
                                @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="address" placeholder="" wire:model="address">
                                    <span class="input-group-text" id="basic-addon1"><span class="mdi mdi-google-maps"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 2 ? ' show active' : ''}}" id="step2" role="tabpanel" aria-labelledby="profile-tab">
                        <h2 class="section_title">Type de bien</h2>
                        <div class="form-elements">
                            <h3><span class="mdi mdi-home-city"></span> {{__('estimations.property_types_label')}}</h3>
                            @error('propertyTypes') <span class="error text-danger">{{ $message }}</span> @enderror
                            <div class="options-wrapper">
                                @foreach($formData['propertyTypesOptions'] as $id => $name)
                                    <div class="x-pretty p-switch p-fill">
                                        <div class="x-state x-p-primary">
                                            <label for="propertyType{{$id}}" style="box-shadow: 1px 1px 1px #ddd;">
                                                <input class="form-check-input"
                                                       type="radio"
                                                       wire:model="propertyTypes"
                                                       id="propertyType{{$id}}"
                                                       value="{{$id}}">
                                                <span class="estimate-type-label">{{$name}}</span><br>
                                                <img class="image" src="{{asset('images/illustration_'.$id.'_unchecked.png') }}">
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 3 ? ' show active' : ''}}" id="step3" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <h2 class="section_title">Caractéristiques</h2>
                        <div class="form-elements row">
                            <div class="my-3 col-md-12 col-sm-12">
                                <h3><span class="mdi mdi-calendar"></span> {{__('estimations.built_year_label')}}</h3>
                                @error('builtYear') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="form-check">
                                    <x-forms.input-number input-wire="builtYear" max="{{date('Y')}}"/>
                                </div>
                            </div>
                            <div class="my-3 col-md-6 col-sm-12">
                                <h3><span class="mdi mdi-floor-plan"></span> {!!__('estimations.surface') !!}</h3>
                                @error('surface') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="form-check">
                                    <x-forms.input-number input-wire="surface" min="9"/>
                                </div>
                            </div>
                            @if ($propertyTypes == 2)
                            <div class="my-3 col-md-6 col-sm-12">
                                <h3><span class="mdi mdi-floor-plan"></span> {!!__('estimations.living_space')!!}</h3>
                                @error('livingSpace') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="form-check">
                                    <x-forms.input-number input-wire="livingSpace" min="0"/>
                                </div>
                            </div>
                            @else
                                <div class="my-3 col-md-6 col-sm-12">&nbsp;</div>
                            @endif
                            <!-- if prop is terrain or magasin no bedroom -->
                            @if ($propertyTypes != 12 && $propertyTypes != 11 && $propertyTypes != 10 )
                            <div class="my-3 col-md-6 col-sm-12">
                                <h3><span class="mdi mdi-bed-king"></span> {{__('estimations.nbr_rooms_label')}}</h3>
                                @error('nbrRooms') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="form-check">
                                    <x-forms.input-number input-wire="nbrRooms" min="0"/>
                                </div>
                            </div>
                            <div class="my-3 col-md-6 col-sm-12">
                                <h3><span class="mdi mdi-bed"></span> {{__('estimations.nbr_bed_rooms')}}</h3>
                                @error('nbrBedRooms') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="form-check">
                                    <x-forms.input-number input-wire="nbrBedRooms" min="0"/>
                                </div>
                            </div>
                            @endif
                            <!-- if prop is terrain office or magasin no bedroom -->
                            @if ($propertyTypes == 99999 )
                            <div class="my-3 col-md-6 col-sm-12">
                                <h3><span class="mdi mdi-floor-plan"></span> {{__('estimations.living_room_surface')}}</h3>
                                @error('livingRoomSurface') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="form-check">
                                    <x-forms.input-number input-wire="livingRoomSurface" min="0"/>
                                </div>
                            </div>
                            @endif
                            <!-- if prop is terrain or douche :) -->
                            @if ($propertyTypes != 12)
                            <div class="my-3 col-md-6 col-sm-12">
                                <h3><span class="mdi mdi-shower-head"></span> {{__('estimations.nbr_water_room')}}</h3>
                                @error('nbrWaterRoom') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="form-check">
                                    <x-forms.input-number input-wire="nbrWaterRoom" min="0"/>
                                </div>
                            </div>
                            <div class="my-3 col-md-6 col-sm-12">
                                <h3><span class="mdi mdi-shower"></span> {{__('estimations.nbr_bath_room')}}</h3>
                                @error('nbrBathRoom') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="form-check">
                                    <x-forms.input-number input-wire="nbrBathRoom" min="0"/>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 4 ? ' show active' : ''}}"
                        id="step4"
                        role="tabpanel"
                        aria-labelledby="profile-tab">
                        <h2 class="section_title">Essentiels</h2>
                        <div class="form-elements">
                            <div class="my-2">
                                <h3><span class="mdi mdi-sofa-outline"></span> {{__('estimations.property_furnished')}}</h3>
                                @error('furnished') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="options-wrapper row">
                                    @foreach(range(0, 1) as $option)
                                    <div class="pretty p-switch p-fill col-md-4 col-sm-12">
                                        <input class="form-check-input"
                                               type="radio"
                                               wire:model="furnished"
                                               id="furnished{{$option}}"
                                               value="{{$option}}">
                                        <div class="state p-success">
                                            <label class="form-check-label" for="furnished{{$option}}">{{__('common_terms.yes_no_'.$option)}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div><hr></div>
                            <div>
                                <h3><span class="mdi mdi-list-status"></span> {{__('estimations.general_condition')}}</h3>
                                @error('generalCondition') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="options-wrapper">
                                    @foreach($formData['propertyConditionsOptions'] as $id => $name)
                                    <div class="pretty p-switch p-fill col-md-3 col-sm-12">
                                        <input class="form-check-input"
                                               type="radio"
                                               wire:model="generalCondition"
                                               id="generalCondition{{$id}}"
                                               value="{{$id}}">
                                        <div class="state p-success">
                                            <label class="form-check-label" for="generalCondition{{$id}}">{{$name}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div><hr></div>
                            <!-- if prop is terrain or magasin no bedroom -->
                            @if ($propertyTypes != 12 && $propertyTypes != 11 && $propertyTypes != 10 )
                            <div class="my-2">
                                <h3><span class="mdi mdi-faucet-variant"></span> {{__('estimations.kitchen_type_label')}}</h3>
                                @error('kitchenType') <span class="error text-danger">{{ $message }}</span> @enderror
                                <div class="options-wrapper">
                                    @foreach($formData['kitchensOptions'] as $id => $name)
                                    <div class="pretty p-switch p-fill col-md-3 col-sm-12">
                                        <input class="form-check-input"
                                               type="radio"
                                               wire:model="kitchenType"
                                               id="kitchenType{{$id}}"
                                               value="{{$id}}">
                                        <div class="state p-success">
                                            <label class="form-check-label" for="kitchenType{{$id}}">{{$name}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <!-- if prop is terrain or magasin no bedroom -->
                            <div class="row">
                                @if ($propertyTypes == 1)
                                <div class="my-3 col-md-6 col-sm-12">
                                    <h3><span class="mdi mdi-garage"></span> {{__('estimations.garage_space')}}</h3>
                                    @error('garageSpace') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <div class="form-check">
                                        <x-forms.input-number input-wire="garageSpace" min="0"/>
                                    </div>
                                </div>
                                @elseif($propertyTypes == 2)
                                <div class="my-3 col-md-6 col-sm-12">
                                    <h3>
                                        <span class="mdi mdi-shield-car"></span> {{__('estimations.nbr_parking_label')}}
                                    </h3>
                                    @error('nbrParking') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <div class="form-check">
                                        <x-forms.input-number input-wire="nbrParking" min="0"/>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 5 ? ' show active' : ''}}" id="step5" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <h2 class="section_title">{{__('estimations.commodities_label')}}</h2>
                        <!-- if prop is terrain or magasin no bedroom -->
                        @if ($propertyTypes != 12 && $propertyTypes != 11 && $propertyTypes != 10 )
                        <div class="form-elements my-4">
                            <h3 for="commodities" class="form-label"><span class="mdi mdi-list-status"></span>
                                {{__('estimations.commodities')}}</h3>
                            <div class="options-wrapper row">
                                @foreach($formData['commodities'] as $id => $name)
                                <div class="pretty p-icon p-curve col-md-4 col-sm-12">
                                    <input class="form-check-input" type="checkbox" wire:model="commodities"
                                           id="commodity{{$id}}"
                                           value="{{$id}}">
                                    <div class="state p-primary">
                                        <i class="icon mdi mdi-check-all"></i>
                                        <label class="form-check-label" for="commodity{{$id}}">{{$name}}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div>
                            <h3><span class="mdi mdi-card-text"></span> {{__('estimations.description')}}</h3>
                            @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                            <div class="mb-3">
                            <textarea class="form-control"
                                      name="description" wire:model="description"
                                      rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 6 ? ' show active' : ''}}" id="step5" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <h2 class="section_title">Vos contact</h2>
                        <div class="form-elements">
                            <div class="my-3">
                                @error('user_email')<div class="alert alert-danger text-lg">{{ $message }}</div>@enderror
                                <h3 for="" class="form-label"><span class="mdi mdi-at"></span> {{__('estimations.user_email_label')
                                    }}</h3>
                                <div class="input-group mb-3">
                                    <input type="email"
                                           class="form-control"
                                           wire:model="user_email"
                                           {{ auth()->user()?->email ? 'disabled' : '' }}
                                    >
                                </div>
                            </div>
                            @if (1 === 2)
                                <div class="my-3">
                                    @error('phoneNumber')<div class="alert alert-danger text-lg">{{ $message }}</div>@enderror
                                    <h3 for="" class="form-label"><span class="mdi mdi-phone"></span> {{__('estimations.phone_number_label')}}</h3>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" wire:model="phoneNumber">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="tab-pane fade{{$currentStep === 7 ? ' show active' : ''}}" id="step5" role="tabpanel" aria-labelledby="contact-tab">
                        <h3><span class="mdi mdi-format-list-group"></span> {!! __('front.estamation_summary') !!}</h3>

                        <div class="form-elements m-0 pt-1">
                            {!! boolval($propertyTypes) ? __('front.property_type', ['value' =>
                            $formData['propertyTypesOptions'][$propertyTypes]]) : '' !!}
                            </strong>
                            {!! boolval($address) ? __('front.property_adress', ['address' => $address]) : '' !!}
                        </div>
                        <div class="form-elements m-0 pt-1">
                            {!! boolval($builtYear) ? "Il est construit en <strong>{$builtYear}</strong>" : ''!!}
                            {!! boolval($surface) ? "Avec une superficie de <strong>{$surface} m<sup>2</sup></strong>" : '' !!}
                            {!! boolval($livingRoomSurface) ? "et un séjour de <strong>{$livingRoomSurface}m<sup>2</sup></strong>"
                            : '.' !!}.
                        </div>
                        @if (boolval($nbrRooms) || ! empty($nbrRooms))
                        <div class="form-elements m-0 pt-1"> <strong><span class="mdi mdi-bed-double"></span></strong>
                            {!! ! empty($nbrRooms) ? trans_choice('front.nbr_room', $nbrRooms) : '' !!}
                            {!! ! empty($nbrBedRooms) ? trans_choice('front.nbr_bed_room', $nbrBedRooms)."." : '.' !!}
                        </div>
                        @endif
                        @if (! empty($nbrWaterRoom) || ! empty($nbrBathRoom))
                        <div class="form-elements m-0 pt-1">
                            Il comprend
                            {!! ! empty($nbrBathRoom) ? trans_choice('front.nbr_bath_room',$nbrBathRoom) : '' !!}
                            {!! ! empty($nbrWaterRoom) ? trans_choice('front.nbr_water_room', $nbrWaterRoom) : '' !!}
                            <p>
                                {!! ! empty($kitchenType)
                                ? ', '.__('front.kitchen_type', ['kitchen' => $formData['kitchensOptions'][$kitchenType]])
                                : ''
                                !!}
                                {!! ! empty($nbrParking) ? ', '.trans_choice('front.nbr_parking', $nbrParking) : '' !!}
                            </p>
                        </div>
                        @endif
                        @if (! empty($commodities))
                        <div class="form-elements m-0 pt-1">
                            Il est équipé de:
                            <ul>
                                @foreach($commodities as $commodity)
                                <li>{!! '<span class="mdi mdi-menu-right"><strong>'.$formData['commodities'][$commodity]
                            .'</strong>' !!}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (! empty($generalCondition))
                        <div class="form-elements m-0 pt-1">
                            {!! __('front.property_condition', ['condition' =>
                            $formData['propertyConditionsOptions'][$generalCondition]]) !!}
                        </div>
                        @endif
                        @if (! empty($description))
                        <div class="form-elements m-0 pt-1"> <strong><span class="mdi mdi-text"></span></strong>
                            {!! $description !!}
                        </div>
                        @endif
                        <div class="form-elements m-0 pt-1">
                            <hr>
                            <strong><span class="mdi mdi-account"></span></strong><br>
                            Vous recevrez notre réponse à l'adresse <strong>{{$user_email}}.</strong><br>
                            @if(boolval($phoneNumber))
                            Nous pouvons vous contacter au <strong>{{$phoneNumber}}.</strong>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="form-buttons-wrapper" class="form-buttons-wrapper row px-0">
            <div class="offset-6 col-6 row">
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
</div>
