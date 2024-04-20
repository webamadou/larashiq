<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::input('name', __('posts.name').' *')
			->id('name')
			->required()
			->type('text')
			->value(old('name', $post->name))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::textarea('content', __('posts.content').' *')
			->id('content')
			->rows(12)
  			->cols(60)
			->value(old('content', $post->content))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6 tiny_editor')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{Aire::select($categories , 'category_id', 'Categorie')
            ->helpText('')
            ->value(old('category_id', $post->category_id))
			->addClass('rounded-sm shadow-xs border-immogray2')
        }}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{Aire::file('images', 'Image de la page')
			->helpText(__("common_terms.upload_image_helptext"))
		}}
	</div>
    @if ($post->image)
        <img src="{{asset($post->getDefaultImage())}}" alt="image" style="height: 100px; width: auto">
    @endif
</div>
<div class="flex flex-column items-center justify-between w-100">
	{{ Aire::submit('Enregistrer')
			->addClass('btn btn-primary mt-3') }}
</div>
