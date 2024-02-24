{{ Aire::input('name', "Le nom de la catégorie *")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $postCategory->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::submit('Enregistrer') }}