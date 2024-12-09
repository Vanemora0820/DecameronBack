<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Asegúrate de que las rutas API sean registradas correctamente
        $this->mapApiRoutes();
    }

    /**
     * Define the routes for the API.
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api') 
             ->middleware('api') 
             ->group(base_path('routes/api.php')); // Ruta al archivo de rutas API
    }
}
