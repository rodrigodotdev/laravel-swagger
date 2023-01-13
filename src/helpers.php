<?php

declare(strict_types=1);

if (! function_exists('swagger_assets')) {
    /**
     * Get the swagger assets route.
     *
     * @param string $asset
     *
     * @return string
     */
    function swagger_assets(string $asset): string
    {
        return route('swagger.assets', ['asset' => $asset]);
    }
}

if (! function_exists('swagger_docs')) {
    /**
     * Get the swagger docs route.
     *
     * @return string
     */
    function swagger_docs(): string
    {
        return route('swagger.docs');
    }
}