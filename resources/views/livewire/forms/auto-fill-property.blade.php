<div class="flex items-center justify-between w-100">
	<div class="w-100 mx-2" style="width: 100%;">
		<div class="mb-6" data-aire-component="group" data-aire-for="name">
	<label class="inline-block mb-2 font-semibold cursor-pointer text-base" data-aire-component="label" for="{{$field_name}}">
	{{ $field_label}}
</label>
	<div class="">		
        <input type="text" class="block w-full leading-normal bg-white border rounded-sm rounded-sm shadow-xs border-immogray2 col-6 p-2 text-base text-gray-900"
        data-aire-component="input" name="autocompleter"
        id="{{$field_name}}"
        data-aire-for="{{$field_name}}"
        wire:model="field_value"
        ><input type="hidden" name="{{$field_name}}" required="" value="{{$picked_property}}">
		</div>
	        <ul class="list-reset mt-2 mb-3 hidden" data-aire-component="errors" data-aire-validation-key="group_errors" data-aire-for="name">
			</ul>
        </div>
        @if($hasOptions)
        <div id="lisproperties-wrapper" wire>
            <ul>
            @foreach($options as  $id => $option)
                <li class="{{$id}}" wire:click="setFormvalue({{$id}})"><i class="fa fa-list"></i>{{$option}}</li>
            @endforeach
            </ul>
        </div>
        @endif
	</div>
</div>
