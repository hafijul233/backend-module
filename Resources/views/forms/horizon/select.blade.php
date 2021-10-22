<div class="form-group row">
    {!! Form::hLabel($name, $label, $required, $col_size) !!}

    @php
    $field_size = abs(12 - $col_size);
    $options = ['class' => "form-control custom-select" . ($errors->has($name) ? ' is-invalid' : NULL )];

    $msg = $errors->first($name) ?? null;

    if(isset($required) && $required == true)
    $options['required'] = 'required';
    @endphp
    <div class="col-md-{{ $field_size }}">
        {!! Form::select($name, $data, $selected, array_merge($options, $attributes)) !!}

        {!! Form::hError($name, $msg) !!}
    </div>
</div>