<?php

namespace D4T\MT4Sdk;

use D4T\MT4Sdk\Manager;
use D4T\MT4Sdk\Terminal;
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
        $this->mergeConfigFrom(__DIR__.'/../config/mt4-sdk.php', 'mt4-sdk');

        $this->app->bind(Manager::class, function () {
            if (config('mt4-sdk.manager.api_token') === null) {
                return null;
            }

            if (config('mt4-sdk.manager.endpoint') === null) {
                return null;
            }

            return new Manager(
                config('mt4-sdk.manager.api_token'),
                config('mt4-sdk.manager.endpoint'),
            );
        });

        $this->app->bind(Terminal::class, function () {
            if (config('mt4-sdk.terminal.api_token') === null) {
                return null;
            }

            if (config('mt4-sdk.terminal.endpoint') === null) {
                return null;
            }

            return new Terminal(
                config('mt4-sdk.terminal.api_token'),
                config('mt4-sdk.terminal.endpoint'),
            );
        });

    }
}