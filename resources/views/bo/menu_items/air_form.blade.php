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
		{{Aire::select($menusPluck, 'menu_id', 'Menu')
			->helpText("Le menu du lien")
			->value(old('menu_id', $menuItem?->menu_id))
		}}
	</div>
    @if($menuItem?->url_editable)
        <div class="w-100 mx-2" style="width: 100%;">
            {{Aire::select($pagesPluck, 'page_id', 'Page')
                ->helpText("L'URL du lien")
                ->value(old('page_id', $menuItem?->page_id))
            }}
        </div>
    @endif
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
        {{Aire::radioGroup([1 => 'Colonne 1', 2 => 'Colonne 2', 3 => 'Colonne 3'], 'column', 'Column')
			->helpText("La colonne ou inserer le lien")
			->defaultValue(old('column', $menuItem?->column))
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
       class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight" aria-label="Fermer"
            wire:click.prevent="closeForm"
    >
        <i class="fa fa-times"></i> Fermer
    </button>
</div>
