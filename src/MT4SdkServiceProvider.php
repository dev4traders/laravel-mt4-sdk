<?php

namespace D4T\MT4Sdk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MT4SdkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-mt4-sdk')
            ->hasConfigFile();
    }

    public function registeringPackage()
    {
        $this->app->bind(MT4Manager::class, function () {
            if (config('mt4-sdk.api_token') === null) {
                return null;
            }

            if (config('mt4-sdk.endpoint') === null) {
                return null;
            }

            return new MT4Manager(
                config('mt4-sdk.api_token'),
                config('mt4-sdk.endpoint'),
            );
        });
    }
}
