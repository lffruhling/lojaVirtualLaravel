<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('cText', 'components.form.text', ['name', 'label', 'value' => null, 'attributes' => []]);
        \Form::component('cEmail', 'components.form.email', ['name', 'label', 'value' => null, 'attributes' => []]);
        \Form::component('cTextarea', 'components.form.textarea', ['name', 'label', 'value' => null, 'attributes' => []]);
        \Form::component('cFile', 'components.form.file', ['name', 'label', 'value' => null, 'attributes' => []]);
        \Form::component('cSelect', 'components.form.select', ['name', 'label', 'data' => [], 'value' => null, 'attributes' => []]);
        \Form::component('cPassword', 'components.form.password', ['name', 'label',  'attributes' => []]);
        \Form::component('cSubmmit', 'components.form.submit', ['name']);
        \Form::component('cCancelar', 'components.form.cancelar', ['name']);
    }
}
