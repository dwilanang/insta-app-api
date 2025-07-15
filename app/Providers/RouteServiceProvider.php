<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // API routes (prefix /api)
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        // Web routes (prefix /)
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
}
