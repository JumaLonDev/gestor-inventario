<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\RouteServiceProvider;
use App\Repositories\ProductoRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class, function ($app) {
            return new ProductoRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
