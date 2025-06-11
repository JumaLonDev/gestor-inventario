<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Rutas para API
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        // Rutas para web
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
}
