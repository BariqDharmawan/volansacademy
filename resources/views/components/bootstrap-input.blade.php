<div class="col-12">
    <div class="form-group">
        <strong>{{ $label }} : </strong>
        @if ($isTextarea)
        <textarea {{ $attributes->merge([
            'class' => 'form-control',
            'name' => $name,
            'placeholder' => $placeholder ?? $label
        ]) }}>{{ old($name) ?? $value }}</textarea>
        @else
        <input {{ $attributes->merge([
            'class' => 'form-control',
            'name' => $name,
            'value' => old($name) ?? $value,
            'placeholder' => $placeholder ?? $label
        ]) }}>
        @endif
        {{ $slot }}
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>