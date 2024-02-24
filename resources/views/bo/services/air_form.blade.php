{{ Aire::input('name', "Le nom du service *")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $service->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{Aire::select($poles, 'pole_id', 'Pôle')
    ->helpText('Sélectionnez un pôle ')
  	->value(old('pole_id', $service->pole_id));
    }}

{{ Aire::submit('Enregistrer') }}