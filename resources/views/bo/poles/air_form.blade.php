{{ Aire::input('name', "Le nom du pôle *")
	->id('name')
	->required()
	->type('text')
	->value(old('name', $pole->name))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{Aire::select($poles, 'parent_id', 'Pole parent')
    ->helpText('Sélectionnez si ce pôle appartient à un autre')
  ->value(old('parent_id', $pole->parent_id));
    }}

{{ Aire::submit('Enregistrer') }}