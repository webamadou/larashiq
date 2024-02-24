<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{Aire::select($pvm->getCountriesOptions(), 'country_id', __('properties.country_libelle').' *')
            ->helpText(__('properties.help_select_country'))
            ->value(old('country_id', $pvm->property->country_id))
			->addClass('rounded-sm shadow-xs border-immogray2')
        }}
	</div>
    <div class="w-6/12 mx-2">
        <div class="mb-6" data-aire-component="group" data-aire-for="country_id">
            <label class="inline-block mb-2 font-semibold cursor-pointer text-base">
                Localisation
            </label>
            <div class="">
                <select
                    name="localisation_id"
                    id="select_localisation"
                    class="block w-full p-2 leading-normal border rounded-sm bg-white appearance-none rounded-sm shadow-xs border-immogray2 text-gray-900">
                    @foreach (\App\Models\City::all() as $city)
                    <optgroup label="{{$city->name}}">
                        @foreach ($city->localisations as $localisation)
                        <option
                            value="{{ $localisation->id }}"
                            {{ $localisation->id == $pvm->property->localisation_id ? 'selected' : '' }}>
                                {{ $localisation->name }}
                        </option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
            </div>
            <ul class="list-reset mt-2 mb-3 hidden" data-aire-component="errors" data-aire-validation-key="group_errors" data-aire-for="country_id">
            </ul>
            <small class="block mt-1 font-normal text-sm text-gray-600" data-aire-component="help_text" data-aire-validation-key="group_help_text" data-aire-for="country_id">
                -
            </small>
        </div>
    </div>
</div>
<!--<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('zone', __('properties.zone'))
			->id('zone')
			->type('text')
			->value(old('zone', $pvm->property->zone))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('street', __('properties.street'))
			->id('street')
			->type('text')
			->value(old('street', $pvm->property->street))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>-->
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('stage', __('properties.stage'))
            ->helpText('À quel étage se trouve le bien?')
			->id('stage')
			->type('text')
			->value(old('stage', $pvm->property->stage))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('apartment_number', __('properties.apartment_number'))
            ->helpText('-')
			->id('apartment_number')
			->type('number')
			->value(old('apartment_number', $pvm->property->apartment_number))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
<div><hr class="border-t-2 border-immogray2 py-6"></div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('latitude', __('properties.latitude'))
            ->helpText('la position en latitude du bien')
			->id('latitude')
			->type('text')
			->value(old('latitude', $pvm->property->pin?->latitude))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('longitude', __('properties.longitude'))
            ->helpText('la position en longitude du bien')
			->id('longitude')
			->type('text')
			->value(old('longitude', $pvm->property->pin?->longitude))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
