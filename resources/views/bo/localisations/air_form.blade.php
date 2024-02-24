{{ Aire::input('name', "Le nom de la localisation *")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $localisation->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{Aire::select($cities, 'city_id', 'Ville *')
    ->helpText('Sélectionnez une ville')
	->required()
  ->value(old('city_id', $localisation->city_id));
    }}

	{{ Aire::input('latitude', "La latitude")
		->id('latitude')
		->required()
		->type('text')
		->value(old('latitude', $localisation->latitude))
		->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
		}}

{{ Aire::input('longitude', "La longitude")
	->id('longitude')
	->type('text')
	->value(old('longitude', $localisation->longitude))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::submit('Enregistrer') }}
