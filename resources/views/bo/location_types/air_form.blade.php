{{ Aire::input('name', "Le nom du type *")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $locationType->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::submit('Enregistrer') }}