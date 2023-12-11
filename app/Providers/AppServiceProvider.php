<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('paginator', function ($app, $data, $perPage) {
            return new LengthAwarePaginator($data, count($data), $perPage);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
