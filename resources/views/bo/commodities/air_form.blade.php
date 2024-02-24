{{ Aire::input('name', "Le nom de la commodité *")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $commodity->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::submit('Enregistrer') }}