<?php

declare(strict_types=1);

namespace Krtz\LaravelSwagger\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Krtz\LaravelSwagger\Swagger;

class SwaggerController extends Controller
{
    public function index(): View
    {
        return view(
            'vendor.laravel-swagger.index',
            [
                'title' => config('swagger.title'),
                'docsUrl' => swagger_docs(),
            ]
        );
    }

    public function assets(string $asset): Response
    {
        $path = Swagger::assetsPath() . $asset;
        $file = (new Filesystem)->get($path);

        return response($file, 200, ['Content-Type' => Swagger::getContentType($path)]);
    }

    public function docs(): Response
    {
        $path = Swagger::docs();
        $file = (new Filesystem)->get($path);

        return response($file, 200, ['Content-Type' => Swagger::getContentType($path)]);
    }
}
