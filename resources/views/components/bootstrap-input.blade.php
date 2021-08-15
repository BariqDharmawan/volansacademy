<div class="col-12">
    <div class="form-group">
        <strong>{{ $label }} : </strong>
        {!! Form::text($name, null, array(
                'placeholder' => $placeholder ?? $label,
                'class' => 'form-control'
            )) 
        !!}
        {{ $slot }}
    </div>
</div>