<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('nbr_rooms', __('properties.nbr_rooms'))
			->id('nbr_rooms')
			->type('text')
			->value(old('nbr_rooms', $pvm->property->nbr_rooms))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('nbr_lounge_rooms', __('properties.nbr_lounge_rooms'))
			->id('nbr_lounge_rooms')
			->type('text')
			->value(old('nbr_lounge_rooms', $pvm->property->nbr_lounge_rooms))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('nbr_bedrooms', __('properties.nbr_bedrooms'))
			->id('nbr_bedrooms')
			->type('text')
			->value(old('nbr_bedrooms', $pvm->property->nbr_bedrooms))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('nbr_kitchens', __('properties.nbr_kitchens'))
			->id('nbr_kitchens')
			->type('text')
			->value(old('nbr_kitchens', $pvm->property->nbr_kitchens))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('nbr_showerrooms', __('properties.nbr_showerrooms'))
			->id('nbr_showerrooms')
			->type('text')
			->value(old('nbr_showerrooms', $pvm->property->nbr_showerrooms))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
	<div class="w-6/12 mx-2">
	</div>
</div>