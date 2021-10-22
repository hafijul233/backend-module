<div class="form-group">
    {!! Form::fLabel($name, $label, $required, ['class' => 'd-block mb-2']) !!}
    <div class="custom-file">
        @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required';
        @endphp

        {!! Form::file($name, array_merge($options, $attributes)) !!}
        {!! Form::nLabel($name, $label, $required, ['class' => 'custom-file-label']) !!}
        {!! Form::nError($name, $msg) !!}
    </div>
</div>