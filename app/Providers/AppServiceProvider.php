<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Pagination maison : le squelette Laravel fournit des vues Tailwind,
        // or ce projet n'utilise pas Tailwind.
        Paginator::defaultView('vendor.pagination.climhero');
        Paginator::defaultSimpleView('vendor.pagination.climhero');

        // En production le site est servi en HTTPS derriere un proxy.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
