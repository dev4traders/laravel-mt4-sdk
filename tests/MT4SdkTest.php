<?php

namespace D4T\MT4Sdk\Tests;

use D4T\MT4Sdk\Facades\MT4Manager;
use D4T\MT4Sdk\MT4SdkServiceProvider;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as Orchestra;

class MT4SdkTest extends Orchestra
{

    /**
     * @test
     */
    public function can_ping()
    {
        $this->assertTrue(MT4Manager::ping());
    }

    public function setUp(): void
    {
        parent::setUp();
        MT4Manager::setTimeout(3);
    }

    protected function getEnvironmentSetUp($app)
    {
        $app->useEnvironmentPath(__DIR__ . '/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
    }

    protected function getPackageProviders($app)
    {
        return [
            MT4SdkServiceProvider::class,
        ];
    }
}