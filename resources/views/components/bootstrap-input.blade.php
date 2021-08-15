<div class="col-12">
    <div class="form-group">
        <strong>{{ $label }} : </strong>
        <input {{ $attributes->merge([
            'class' => 'form-control',
            'name' => $name,
            'value' => old($name) ?? '',
            'placeholder' => $placeholder ?? $label
        ]) }}>
        {{ $slot }}
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>