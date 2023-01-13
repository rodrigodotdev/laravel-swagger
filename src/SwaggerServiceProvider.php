<?php

declare(strict_types=1);

namespace Krtz\LaravelSwagger;

use Illuminate\Support\ServiceProvider;

class SwaggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/swagger.php', 'swagger');

        $this->app->singleton('laravel-swagger', function () {
            return new Swagger();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/swagger.php' => config_path('swagger.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => config('swagger.paths.views'),
        ], 'views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-swagger');

        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
    }
}
