<?php

namespace D4T\MT4Sdk\Tests;

use D4T\MT4Sdk\Facades\MT4Terminal;
use D4T\MT4Sdk\MT4SdkServiceProvider;
use D4T\MT4Sdk\Requests\TerminalAccountCreateRequest;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as Orchestra;

class MT4SdkTerminalTest extends Orchestra
{

    /**
     * @test
     */
    public function can_ping()
    {
        $this->assertTrue(MT4Terminal::ping());
    }

    /**
     * @test
     */
    public function can_create_account()
    {
        $accountCredentials = MT4Terminal::createAccount(
            new TerminalAccountCreateRequest(
                "3.114.86.50",
                443,
                100,
                100000,
                "testM",
                "test1@tst.com",
                "EightcapLtd-Demo3",
                "Ru",
                "Def",
                "State",
                "zip",
                "Address",
                "+1",
                "demoforex"
            ));

        $this->assertNotNull($accountCredentials->user);
    }

    public function setUp(): void
    {
        parent::setUp();
        MT4Terminal::setTimeout(3);
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