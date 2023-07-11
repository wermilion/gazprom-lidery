<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;
use URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('cyrillic', function ($attribute, $value) {
            return preg_match(pattern: '/^[?!,.а-яА-ЯёЁ0-9\s]+$/u', subject: $value);
        });

        if (config('app.force_https')) {
            URL::forceScheme('https');
        }
    }
}
