<?php

namespace App\Providers;

use App\Events\CategoriasEvent;
use App\Model\Categorias;
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
    }
}
