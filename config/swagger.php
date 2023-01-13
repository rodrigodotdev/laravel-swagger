<?php

declare(strict_types=1);

use Krtz\LaravelSwagger\Http\Controllers\SwaggerController;

return [

    /**
     * Title of Swagger UI page.
     */
    'title' => 'Laravel Swagger',

    /**
     * Controller that will be used by the application.
     */
    'controller' => SwaggerController::class,

    'route' => [
        /**
         * Route to access the Swagger UI.
         */
        'path' => 'swagger',

        /**
         * Route middleware.
         */
        'middleware' => ['web'],
    ],

    'paths' => [
        /**
         * Path to the swagger docs.
         */
        'docs' => storage_path('api-docs'),

        /**
         * YAML documentation filename.
         */
        'docs_yaml' => 'api-docs.yaml',

        /**
         * JSON documentation filename.
         */
        'docs_json' => 'api-docs.json',

        /**
         * Path to publish the views.
         */
        'views' => base_path('resources/views/vendor/laravel-swagger'),

        /**
         * Path of swagger ui assets.
         */
        'assets' => 'vendor/swagger-api/swagger-ui/dist/'
    ],

];