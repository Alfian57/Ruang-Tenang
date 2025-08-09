<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        Blade::anonymousComponentNamespace('member.components', 'member');
        Blade::anonymousComponentNamespace('auth.components', 'auth');

        Blade::anonymousComponentNamespace('member.layouts', 'member-layouts');
        Blade::anonymousComponentNamespace('auth.layouts', 'auth-layouts');

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
