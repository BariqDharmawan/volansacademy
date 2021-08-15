<div class="custom-control custom-radio">
    <input type="radio"
    {{ $attributes->merge([
        'class' => 'custom-control-input',
        'id' => $id,
        'name' => $name
    ]) }}>
    <label class="custom-control-label mr-2" for="{{ $id }}">
        {{ $label }}
    </label>
</div>