<div class="flex items-center justify-between w-100 container row input-group mb-3 mt-3 p-0" style="width: 100%;
 margin-left: 1px">
    <div class="w-6/12 {{$hasChildren ? 'col-6' : 'col-12'}} p-0">
        <div class="mb-6 tw input-group" data-aire-component="group" data-aire-for="{{$parentFieldName}}">
            <label class="inline-block mb-2 font-semibold cursor-pointer text-base d-none" data-aire-component="label">
                Type de bien
            </label>

                <label class="input-group-text hidden" for="inputGroupSelect01">
                    <span class="mdi mdi-apple-keyboard-option"></span>
                </label>
                <select class="block w-full p-2 leading-normal border rounded-sm bg-white appearance-none
            rounded-sm shadow-xs border-immogray2 text-gray-900 form-control rounded-0"
                        data-aire-component="select"
                        name="{{$parentFieldName}}"
                        data-aire-for="{{$parentFieldName}}"
                        wire:model="parentValue"
                >
                    <option value="0">Type de bien</option>
                    @foreach($parents as $id => $parent)
                    <option value="{{$id}}"
                            wire:key="{{$id}}"
                            {{$id === $parentValue ? 'selected="selected"' : ''}}>
                    {{$parent}}
                    </option>
                    @endforeach
                </select>

            <ul class="list-reset mt-2 mb-3 hidden" data-aire-component="errors"
                data-aire-validation-key="group_errors" data-aire-for="{{$parentFieldName}}">
            </ul>
            <small class="block mt-1 font-normal text-sm text-gray-600" data-aire-component="help_text"
                   data-aire-validation-key="group_help_text" data-aire-for="{{$parentFieldName}}">
            </small>
        </div>
    </div>
    <div class="w-6/12 col-6 p-0 ps-2 {{$hasChildren ? 'visible d-block' : 'hidden d-none'}}">
        <div class="mb-6" data-aire-component="group" data-aire-for="{{$childFieldName}}">
            <label class="inline-block mb-2 font-semibold cursor-pointer text-base d-none" data-aire-component="label"
                   for="__aire-0-{{$childFieldName}}14">
                Type d'appartement
            </label>
            <select class="block w-full p-2 leading-normal border rounded-sm bg-white appearance-none
            rounded-sm shadow-xs border-immogray2 text-gray-900 form-control rounded-0"
                    name="{{$childFieldName}}"
                    wire:model="childValue"
            >
                @foreach($children as $id => $child)
                    <option value="{{$id}}"
                            wire:key="{{$id}}"
                        {{$id === $childValue ? 'selected="selected"' : ''}}>
                        {{$child}}
                    </option>
                @endforeach
            </select>
            <ul class="list-reset mt-2 mb-3 hidden" data-aire-component="errors"
                data-aire-validation-key="group_errors" data-aire-for="{{$childFieldName}}">
            </ul>
            <small class="block mt-1 font-normal text-sm text-gray-600" data-aire-component="help_text"
                   data-aire-validation-key="group_help_text" data-aire-for="{{$childFieldName}}">
            </small>
        </div>
    </div>
</div>
