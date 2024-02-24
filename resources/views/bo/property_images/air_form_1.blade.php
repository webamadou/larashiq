<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{Aire::select($owners, 'owner', 'Propriétaire *')
            ->helpText('')
            ->value(old('owner', $property->owner))
			->addClass('rounded-sm shadow-xs border-immogray2')
        }}
	</div>
	<div class="w-6/12 mx-2">
        {{Aire::select($propertyTypes, 'property_type_id', 'Type de bien')
            ->helpText('')
            ->value(old('pole_id', $property->property_type_id))
			->addClass('rounded-sm shadow-xs border-immogray2')
        }}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('name', __('properties.libelle').' *')
			->id('name')
			->required()
			->type('text')
			->value(old('name', $property->name))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
    <div class="w-6/12 mx-2">
        {{Aire::select($locationTypes, 'location_type_id', 'Type de location')
            ->helpText('')
			->required()
            ->value(old('location_type_id', $property->location_type_id))
			->addClass('rounded-sm shadow-xs border-immogray2')
        }}
    </div>
</div>
<div class="flex items-start justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::textarea('description', __('properties.description').' *')
			->id('description')
			->rows(12)
  			->cols(60)
			->value(old('description', $property->description))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
    <div class="w-6/12 mx-2 flex items-start flex-col justify-start">
		{{ Aire::input('total_surfaces', __('properties.superficie'))
			->id('total_surfaces')
			->type('number')
			->value(old('total_surfaces', $property->total_surfaces))
			->addClass('rounded-sm shadow-xs border-immogray2 w-100')
		}}
		{{ Aire::input('statut', __('properties.status'))
			->id('statut')
			->type('text')
			->disabled(true)
			->value(old('statut', $property->statut))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6 bg-immogray2')
		}}
    </div>
</div>