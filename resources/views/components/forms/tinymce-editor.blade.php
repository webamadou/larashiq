<div class="w-6/12 mx-2">
    {{ Aire::textarea('description', __('properties.description').' *')
        ->id('description')
        ->rows(12)
          ->cols(60)
        ->value(old('description', $pvm->property->description))
        ->addClass('rounded-sm shadow-xs border-immogray2 col-6 tiny_editor')
    }}
</div>
