<?php
$error = ($errors->has($name)) ? "is-invalid" : null;
?>
<div class="form-group">
    {{ Form::label($name, $label, ['class' => 'control-label']) }}
    {{ Form::password($name, array_merge(['class' => 'form-control'], $attributes)) }}
    @if (!is_null($error))
        <span class="error">
            <label id="formfield2-error" class="error" for="formfield2">{!! $errors->first($name) !!}</label>
        </span>
    @endif
</div>
