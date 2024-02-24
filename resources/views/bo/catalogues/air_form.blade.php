{{ Aire::input('name', "Le titre du catalogue*")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $catalogue->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::textarea('description', __('catalogues.description').' *')
	->id('description')
	->rows(12)
	->cols(60)
	->value(old('description', $catalogue->description))
	->addClass('rounded-sm shadow-xs border-immogray2 col-6 tiny_editor')
	}}