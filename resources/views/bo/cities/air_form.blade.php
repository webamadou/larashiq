{{ Aire::input('name', "Le nom de la ville *")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $city->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{Aire::select($countries, 'country_id', 'Pays')
    ->helpText('Sélectionnez un pays')
  ->value(old('country_id', $city->country_id));
    }}

{{ Aire::submit('Enregistrer') }}