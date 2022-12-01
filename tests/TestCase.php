<?php

namespace Spatie\MailcoachSdk\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use D4T\MT4Sdk\MT4SdkServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            MT4SdkServiceProvider::class,
        ];
    }
}
