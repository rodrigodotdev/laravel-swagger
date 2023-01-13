<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Krtz\LaravelSwagger\Http\Controllers\SwaggerController;

Route::group([
    'middleware' => config('swagger.route.middleware', ['web']),
    'controller' => config('swagger.controller', SwaggerController::class),
], function () {
    $path = config('swagger.route.path', 'swagger');

    Route::get($path, 'index')->name('swagger.index');
    Route::get($path . '/assets/{asset}', 'assets')->name('swagger.assets');
    Route::get($path . '/docs', 'docs')->name('swagger.docs');
});