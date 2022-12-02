<?php

namespace D4T\MT4Sdk;

use D4T\MT4Sdk\Manager;
use Illuminate\Support\ServiceProvider;

class MT4SdkServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/mt4-sdk.php' => config_path('mt4-sdk.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/mt4-sdk.php.php', 'mt4-sdk');

        $this->app->bind(Manager::class, function () {
            if (config('mt4-sdk.api_token') === null) {
                return null;
            }

            if (config('mt4-sdk.endpoint') === null) {
                return null;
            }

            return new Manager(
                config('mt4-sdk.api_token'),
                config('mt4-sdk.endpoint'),
            );
        });

    }

}
