<?php

namespace Sil2\Vidflex;

use Illuminate\Support\ServiceProvider;

class VidflexServiceProvider extends ServiceProvider
{

    protected $commands = [
    ];

    protected $routeMiddleware = [
        Middleware\VidFlexApi::class,
        Middleware\VidFlexApiAuth::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        };

        $this->app->make('Sil2\Vidflex\Controllers\Api\Api');
        $this->app->make('Sil2\Vidflex\Controllers\Api\OrderController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}
