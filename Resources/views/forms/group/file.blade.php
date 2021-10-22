<div class="form-group">
    {!! Form::fLabel($name, $label, $required, ['class' => 'd-block mb-2']) !!}
    <div class="custom-file">
        @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required';
        @endphp
        @if(isset($position) && $position = 'before')
            <div class="input-group-prepend">
            <span class="input-group-text">
                @if(!empty($icon))
                    <i class="{{ $icon }}"></i>
                @endif
            </span>
            </div>
        @endif
        {!! Form::file($name, array_merge($options, $attributes)) !!}
        @if(isset($position) && $position = 'after')
            <div class="input-group-prepend">
            <span class="input-group-text">
                @if(!empty($icon))
                    <i class="{{ $icon }}"></i>
                @endif
            </span>
            </div>
        @endif
        {!! Form::nLabel($name, $label, $required, ['class' => 'custom-file-label']) !!}
        {!! Form::nError($name, $msg) !!}
    </div>
</div>
