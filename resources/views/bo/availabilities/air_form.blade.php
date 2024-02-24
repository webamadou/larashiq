{{ Aire::input('name', "Le nom de la disponibilité *")
	->id('name')
	->type('text')
	->required()
	->value(old('name', $availability->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}
{{ Aire::input('icon', "Le nom de l'icon")
	->id('icon')
	->type('text')
	->value(old('icon', $availability->icon))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}
{{ Aire::input('color', "Le code couleur")
	->id('color')
	->type('text')
	->value(old('color', $availability->color))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::submit('Enregistrer') }}