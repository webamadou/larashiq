<div class="flex items-center justify-between w-100">
	<div class="w-full mx-2">
		{{ Aire::input('name', __('properties.libelle').' *')
			->id('name')
			->required()
			->type('text')
			->value(old('name', $pvm->property->name))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
    <input type="hidden" name="owner" id="name"/>
	<div class="w-6/12 mx-2 flex">
        {{
            Aire::radioGroup($pvm->getAcquisitionTypes(), 'radio', "Type d'acquisition *")
                ->name('acquisition_type')
		        ->value($pvm->property?->acquisition_type)
                ->addClass('flex');
        }}
	</div>
	<div class="w-6/12 mx-2">
        {{Aire::select($pvm->getCategoriesOptions(), 'category_id', 'Catégorie')
            /*->helpText('Attribuer une catégorie')*/
            ->value(old('category_id', $pvm->property->category_id));
        }}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::textarea('description', __('properties.description').' *')
			->id('description')
			->rows(12)
  			->cols(60)
			->value(old('description', $pvm->property->description))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6 tiny_editor')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-full">
    <livewire:property-type-fields
        selectedValue="{{old('property_type_id', $pvm->property->property_type_id)}}"
        parentFieldName="property_type_id"
        childFieldName="property_type_child_id"
        aria-label="Type de biens"
    />
</div>
<div class="flex items-center justify-between w-100 border-t-2 border-immogray2 py-2.5 px-4 border-b-2 mb-2 bg-white">
    <div class="w-6/12 mx-2 inline-radio-group">
        <label class="inline-block mb-2 font-semibold text-base" data-aire-component="label">
            {{__('properties.property_usages')}}
        </label>
		{{Aire::radioGroup($pvm->getPropertyUsagesOptions(), 'property_usage_id')
		    ->value($pvm->property->property_usage_id)
		    ->addClass('flex')
		}}
	</div>
    <div class="w-6/12 mx-2 inline-radio-group">
        <label class="inline-block mb-2 font-semibold text-base" data-aire-component="label">
            Ameublement du bien
        </label>
        {{
            Aire::radioGroup([1 => __('properties.non_furnished'), 2 => __('properties.furnished')],
            'furnished')
            ->value($pvm->property->furnished)
        }}
    </div>
    <div class="flex items-center justify-between w-100">
        {{ Aire::input('total_surfaces', __('properties.superficie').' *')
            ->id('total_surfaces')
            ->type('number')
            ->value(old('total_surfaces', $pvm->property->total_surfaces))
            ->addClass('rounded-sm shadow-xs border-immogray2 w-100')
        }}
    </div>
</div>
<div class="flex flex-column items-center justify-between w-100" x-data="embeddedData()">
	<div class="w-10/12 mx-2">
		{{ Aire::input('embedded_url', __('properties.3d_url'))
			->id('embedded_url')
			->type('url')
			->value(old('embedded_url', $pvm->property->embedded_url))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
			->placeholder('ex: https://www.youtube.com/embed/lgajO-fepn4')
			->helpText(__('properties.3d_url_help'))
		}}
	</div>

    <div id="embeded_vid_wrapper" style="width: 100%" x-show="true">
        @if($pvm->property->embedded_url)
            <iframe width="560"
                    height="315"
                    src="{{$pvm->property->embedded_url}}"
                    title="{{$pvm->property->embedded_url}}"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        @endif
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script defer>
    const url = @json($pvm->property->embedded_url);
    const name = @json($pvm->property->name);

    function embeddedData ()
    {
        return {
            url,
            name,
            isVisble: () => ! url ?? false,
            urlUpdated: () => {
                return true;
            }
        }
   }
</script>

