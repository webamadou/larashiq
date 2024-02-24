<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::input('name', __('pages.name').' *')
			->id('name')
			->required()
			->type('text')
			->value(old('name', $page->name))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::textarea('content', __('pages.content').' *')
			->id('content')
			->rows(12)
  			->cols(60)
			->value(old('content', $page->content))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6 tiny_editor')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{Aire::file('images', 'Image de la page')
			->helpText(__("pages.upload_image_helptext"))
		}}
	</div>
    @if ($page->image)
        <img src="{{asset($page->getDefaultImage())}}" alt="image" style="height: 100px; width: auto">
    @endif
</div>
<div class="flex flex-column items-center justify-between w-100">
	{{ Aire::submit('Enregistrer') }}
</div>
