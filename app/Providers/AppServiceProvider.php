<?php

namespace App\Providers;

use App\Events\CategoriasEvent;
use App\Events\TipoPagamentosEvent;
use App\Model\Categorias;
use App\Model\Tipopagamentos;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Categorias::observe(CategoriasEvent::class);
        Tipopagamentos::observe(TipoPagamentosEvent::class);
    }
}
