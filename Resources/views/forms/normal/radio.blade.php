<div class="custom-control custom-radio">
    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
    <label class="custom-control-label" for="customRadio1">Custom radio</label>
</div>
<div class="form-group">
    {!! Form::nLabel($name, $label, $required) !!}

    @php
    $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : NULL )];

    $msg = $errors->first($name) ?? null;

    if(isset($required) && $required == true)
    $options['required'] = 'required';
    @endphp

    {!! Form::radio($name, $checked, array_merge($options, $attributes)) !!}

    {!! Form::nError($name, $msg) !!}
</div>