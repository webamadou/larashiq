<div class="flex items-center justify-between w-100">
    @if (isset($menuItem->id))
        <input type="hidden" name="id" wire:model="menuItemId">
    @endif
	<div class="w-100 mx-2" style="width: 100%;">
		{{ Aire::input('name', __('pages.name').' *')
			->id('name')
			->required()
			->type('text')
			->value(old('name', $menuItem?->name))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
        {{Aire::radioGroup($menuPositions, 'menu_position', 'menu_position')
			->helpText("La position ou inserer le menu")
			->required()
			->defaultValue(old('menu_position', $menuPosition))
		}}
	</div>
</div>
<div class="flex flex-column items-start w-100">
	<button type="submit"
       class="inline-block mx-5 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight" aria-label="Enregistrer"
    >
        <i class="fa fa-save"></i> Enregistrer
    </button>
    <button type="button"
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight"
            wire:click.prevent="closeForm" aria-label="Fermer"
    >
        <i class="fa fa-times"></i> Fermer
    </button>
</div>
