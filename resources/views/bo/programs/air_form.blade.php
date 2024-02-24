<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::input('name', __('programs.name').' *')
			->id('name')
			->required()
			->type('text')
			->value(old('name', $program->name))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>

	<!-- @ livewire('forms.auto-fill-property', [
		'field_name' => 'property_id',
		'picked_property' => $program->id,
		'field_value' => $program->property->name ?? ''
		]) -->

<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::textarea('content', __('programs.content').' *')
			->id('content')
			->rows(12)
  			->cols(60)
			->value(old('content', $program->content))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6 tiny_editor')
		}}
	</div>
</div>

<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::textarea('home_description', __('programs.home_description'))
			->id('home_description')
			->rows(7)
  			->cols(60)
			->value(old('home_description', $program->home_description))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6 tiny_editor')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
	<!-- --------------- -->
	<div class="mb-6" data-aire-component="group" data-aire-for="is_active">
		<div class="">
			<label class="flex items-baseline" data-aire-component="label" data-aire-validation-key="checkbox_label" data-aire-for="is_active" for="is_active">
				<input type="checkbox" value="1" class="pr-2 bg-immogray2" data-aire-component="checkbox" name="is_active" data-aire-for="is_active" id="is_active"
				{{ $program->is_active === 1 ? 'checked="true"' : '' }}>
				<span class="ml-2 flex-1" data-aire-component="wrapper" data-aire-validation-key="checkbox_wrapper" data-aire-for="is_active">
					{{__('programs.is_active')}}
				</span>
			</label>
		</div>
		<ul class="list-reset mt-2 mb-3 hidden" data-aire-component="errors" data-aire-validation-key="group_errors" data-aire-for="is_active"></ul>
		<small class="block mt-1 font-normal text-sm text-gray-600" data-aire-component="help_text" data-aire-validation-key="group_help_text" data-aire-for="is_active">
			Si coché, ce programme sera le seul affiché dans le menu 'Immobilier Pro'
		</small>
	</div>
</div>
<div class="flex flex-column items-center justify-between w-100">
	{{ Aire::submit('Enregistrer') }}
</div>
