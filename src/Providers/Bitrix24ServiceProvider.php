<?php

namespace GerasimovS\Bitrix24\Providers;

use GerasimovS\Bitrix24\Middleware\Bitrix24;
use Illuminate\Support\ServiceProvider;

class Bitrix24ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishResources();

        $this->setAliasesMiddleware();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/bitrix24.php',
            'bitrix24'
        );
    }

    /**
     * @return void
     */
    public function publishResources()
    {
        $this->publishes([
            __DIR__ . '/../config/bitrix24.php' => config_path('bitrix24.php'),
        ], 'config');
    }

    /**
     * @return void
     */
    public function setAliasesMiddleware()
    {
        $this->app['router']->aliasMiddleware(
            'bitrix24',
            Bitrix24::class
        );
    }
}
