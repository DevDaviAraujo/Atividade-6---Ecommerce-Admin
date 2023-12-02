<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProdutosCategorias;
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
        $menu = ProdutosCategorias::get();
        view()->share(compact('menu'));

    }
}
