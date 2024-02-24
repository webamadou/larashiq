<div class="relative mb-6">
    <label class="inline-block mb-2 font-semibold cursor-pointer text-base"
           data-aire-component="label"
           for="name"
    >
        {{$inputLabel}}
    </label>
    <div>
        <div>
            <input type="text"
                   class="block w-full leading-normal bg-white border rounded-sm rounded-sm shadow-xs border-immogray2
                   col-6 p-2 text-base text-gray-900"
                   data-aire-component="input"
                   name="fake-input"
                   id="fake-input"
                   wire:model="inputDisplayingValue"
            >
            <input type="hidden"
                   name="{{$inputName}}"
                   id="name"
                   required=""
                   wire:model="inputSavingValue">
        </div>
        <div class="relative">
            <div class="justify-center shadow border-gray-700 absolute z-50 animate__animated
                 {{$optionsVisible ? 'animate__slideInDown' : 'hidden'}} animate__faster"
                id="autocompletiondiv">
                <button type="button"
                        class="absolute left-1 z-10 bg-red-100 rounded-b-lg text-red-400 text-xs px-2 py-1 mr-2"
                        wire:click.prevent="hideOptions" aria-label="Fermer">x</button>
                <ul class="bg-white w-96 text-gray-900">
                    @forelse($modelOptions as $key => $option)
                        <li class="px-6 py-1 pl-10 border-b border-immogray2 w-full rounded-none text-xs cursor-pointer
                        {{!$loop->odd ? 'bg-immogray1' : 'bg-immogray2'}}"
                            wire:click="setNewValue({{$option->id}})"
                            wire:key="{{$option->id}}"
                        >
                            {{"$option->first_name $option->name"}}
                        </li>
                    @empty
                        <li class="px-6 py-1 pl-10 border-b border-immogray2 w-full rounded-none text-xs text-immogray3">
                            Aucun resultat
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
