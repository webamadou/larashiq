<div class="choice-input flex items-center h-5">
    <input class="form-checkbox h-4 w-4 text-blue-600 border-slate-300 focus:ring-blue-500"
           name="$columnName"
           id="$columnName"
           type="checkbox"
           value="1"
           wire:click="toggleSwitch( {{$modelObject}} )"
        {{ $columnValue === 1 ? 'checked="checked"' : ''}}>
</div>
