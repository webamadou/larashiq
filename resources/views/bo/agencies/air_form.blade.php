<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::input('name', __('agencies.name').' *')
			->id('name')
			->required()
			->type('text')
			->value(old('name', $agency->name))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::textarea('slogan', __('agencies.slogan'))
			->id('slogan')
			->rows(4)
  			->cols(60)
			->value(old('slogan', $agency->slogan))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('email', __('agencies.email').' *')
			->id('email')
			->type('text')
			->required()
			->value(old('email', $agency->email))
			->addClass('rounded-sm shadow-xs border-immogray2 w-100')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('phone_number', __('agencies.phone_number').' *')
			->id('phone_number')
			->type('text')
			->required()
			->value(old('phone_number', $agency->phone_number))
			->addClass('rounded-sm shadow-xs border-immogray2 w-100')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('address', __('agencies.address'))
			->id('address')
			->type('text')
			->value(old('address', $agency->address))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{Aire::select($years, 'exist_since', __('agencies.exist_since'))
			->helpText('')
			->value(old('exist_since', $agency->exist_since ?? ''))
			->addClass('rounded-sm shadow-xs border-immogray2')
		}}
	</div>
</div>
<div class="flex flex-column items-center justify-between w-100">
	{{ Aire::submit('Enregistrer') }}
</div>