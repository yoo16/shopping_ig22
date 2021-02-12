<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CartServiceProvieder extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Cart', 'App\Services\CartService');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
