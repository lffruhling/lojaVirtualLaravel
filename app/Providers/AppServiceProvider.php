<?php

namespace App\Providers;

use App\Events\CategoriasEvent;
use App\Events\ProdutosEvent;
use App\Events\StatusEvent;
use App\Events\TipoPagamentosEvent;
use App\Model\Categorias;
use App\Model\Produtos;
use App\Model\Status;
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
        Produtos::observe(ProdutosEvent::class);
        Status::observe(StatusEvent::class);
    }
}
