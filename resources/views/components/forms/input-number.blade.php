<div class="input-group mb-3">
    <button type="button"
        class="btn btn-outline-secondary btn-increment"
        wire:click.prevent="decrementInputNumber('{{$inputWire}}', '{{$pace}}', {{$min}})"
        aria-label="Moins">-</button>
    <input type="number"
            class="form-control"
            id="{{$inputWire}}"
            placeholder=""
            wire:model="{{$inputWire}}"
            min="{{$min}}"
            max="{{$max}}"
            >
    <button type="button"
        class="btn btn-outline-secondary btn-increment"
        wire:click.prevent="incrementInputNumber('{{$inputWire}}', '{{$pace}}', {{$max}})" aria-label="Plus">+</button>
</div>