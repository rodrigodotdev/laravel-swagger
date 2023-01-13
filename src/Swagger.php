<?php

declare(strict_types=1);

namespace Krtz\LaravelSwagger;

class Swagger
{
    public static function docsPath(): string
    {
        return config('swagger.paths.docs');
    }

    public static function docsJsonPath(): string
    {
        $docsPath = substr(self::docsPath(), -1) == '/' ? self::docsPath() : self::docsPath() . '/';
        return $docsPath . config('swagger.paths.docs_json');
    }

    public static function docsYamlPath(): string
    {
        $docsPath = substr(self::docsPath(), -1) == '/' ? self::docsPath() : self::docsPath() . '/';
        return $docsPath . config('swagger.paths.docs_yaml');
    }

    public static function docs(): string
    {
        if (file_exists(self::docsYamlPath())) {
            return self::docsYamlPath();
        } elseif (file_exists(self::docsJsonPath())) {
            return self::docsJsonPath();
        }
    }

    public static function assetsPath(): string
    {
        $default = '/vendor/swagger-api/swagger-ui/dist/';
        $path = base_path(config('swagger.paths.assets', $default));
        return substr($path, -1) == '/' ? $path : $path . '/';
    }

    public static function getContentType(string $path): string
    {
        $fileExtension = pathinfo($path, PATHINFO_EXTENSION);

        $types = [
            'json' => 'application/json',
            'yaml' => 'application/yaml',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
        ];

        return $types[$fileExtension] ?? 'text/plain';
    }
}