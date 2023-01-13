<h1>Laravel Swagger</h1>

A simple swagger integration with laravel

### Installation

Require the package using composer:

```bash
composer require krtz/laravel-swagger
```

Publish the config file and view files using the following command:

```bash
php artisan vendor:publish --provider="Krtz\LaravelSwagger\SwaggerServiceProvider"
```

It will publish the config file `swagger.php` and the view file `index.blade.php` in the `resources/views/vendor/laravel-swagger` directory.

### Usage

Drop your swagger json or yaml file in the `storage/api-docs` directory and update the `config/swagger.php` file with the file name.

```php
return [
    'docs_yaml' => 'api-docs.yaml',

    'docs_json' => 'api-docs.json',
];
```