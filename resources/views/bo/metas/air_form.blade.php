{{ Aire::input('url', "L'url de la page*")
	->id('url')
	->required()
	->type('text')
	->value(old('url', $meta->url))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::input('title', "Title tag")
	->id('title')
	->type('text')
	->value(old('title', $meta->title))
	->helpText('Title tag')
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::input('keywords[]', "Meta keywords")
	->id('keywords')
	->type('text')
	->helpText('Meta keywords. Les keywords doivent être séparés par des virgules')
	->value(old('keywords', $meta->keywords ? implode(',', $meta->keywords) : []))
	->addClass('rounded-sm shadow-sm border-immogray2 rounded-b-lg')
	}}

{{ Aire::textarea('description', "Meta description")
	->id('description')
	->rows(12)
	->cols(60)
	->value(old('description', $meta->description))
	->addClass('rounded-sm shadow-xs border-immogray2 col-6 tiny_editor')
	}}
