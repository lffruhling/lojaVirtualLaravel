<?php
$error = ($errors->has($name)) ? "has-error" : null;

if (array_key_exists(0, $data)) {
    $data = $data;
} else {
    $data = ['...'] + $data;
}

?>
<div class="form-group">
    @if(!empty($label))
        {{ Form::label($name, $label, ['class' => 'control-label']) }}
    @endif
    {{ Form::select($name, $data, $value, array_merge(['class' => "form-control chosen col-md-12"], $attributes)) }}
    @if (!is_null($error))
        <span class="error">
            <label id="formfield2-error" class="error" for="formfield2">{!! $errors->first($name) !!}</label>
        </span>
    @endif
</div>
