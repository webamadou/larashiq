<div class="flex items-center justify-between w-100">
	<div class="w-full">
        @foreach ($pvm->getCommoditiesOptions() as $commodity)
            <label class="flex items-baseline mb-2 ml-2 border-transparent border-l w-6/12 mx-2"
                   data-aire-component="label"
                   data-aire-validation-key="checkbox_group_label"
                   data-aire-for="json_commodities">
                <input type="checkbox"
                       class="bg-immogray2"
                       data-aire-component="checkbox-group"
                       data-aire-validation-key="checkbox_group"
                       name="json_commodities[]"
                       data-aire-for="json_commodities"
                       value="{{$commodity['id']}}"
                       {{
                        in_array($commodity['id'], $pvm->property->commodities->pluck('id')->toArray()) ?
                'checked="checked"' : ''
                       }}
                >
                <span class="flex-1 ml-2"
                      data-aire-component="label_wrapper"
                      data-aire-validation-key="checkbox_group_label_wrapper"
                      data-aire-for="json_commodities">
                    <span class="{{strtolower($commodity['icon_classes'])}}"></span> {{ $commodity['name'] }}
                </span>
            </label>
        @endforeach
	</div>
</div>
