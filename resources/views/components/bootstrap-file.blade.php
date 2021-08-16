<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>{{ $label }}</strong>
        <div class="custom-file">
            <input {{ $attributes->merge(['type' => 'file', 'class' => 'custom-file-input', 'name' => $name, 'id' => $id ?? $name]) }}>
            <label class="custom-file-label" for="{{ $id ?? $name }}">
                {{ $placeholder ?? $label }}
            </label>
        </div>
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>