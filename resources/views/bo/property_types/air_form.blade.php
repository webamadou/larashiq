{{ Aire::input('name', "Le nom du type de bien *")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $propertyType->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::submit('Enregistrer') }}