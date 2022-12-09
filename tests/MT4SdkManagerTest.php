<?php

namespace D4T\MT4Sdk\Tests;

use D4T\MT4Sdk\Facades\MT4Manager;
use D4T\MT4Sdk\MT4SdkServiceProvider;
use D4T\MT4Sdk\Resources\Account;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as Orchestra;

class MT4SdkTest extends Orchestra
{

    private ?Account $account = null;

    /**
     * @test
     */
    public function can_ping()
    {
        $this->assertTrue(MT4Manager::ping());
    }

    /**
     * @test
     */
    public function not_zero_list_account_logins()
    {
        $this->assertNotCount(0, MT4Manager::listAccountLogins());
    }

    /**
     * @test
     */
    public function can_create_account()
    {
        $this->account = MT4Manager::createAccount(['name' => 'TestL', 'email' => 'testl@test.com', 'group' => 'demoHFX-USD']);
        $this->assertEquals('TestL', $this->account->name);
    }

    /**
     * @test
     */
    public function can_update_account()
    {
        if($this->account) {
            $this->account = MT4Manager::updateAccount($this->account->login, ['name' => 'TestU']);
            return $this->assertEquals('TestU', $this->account->name);
        }

        return $this->assertTrue(false);
    }

    /**
     * @test
     */
    public function can_delete_account()
    {
        if($this->account)
            return $this->assertTrue(MT4Manager::deleteAccount($this->account->login));

        return $this->assertTrue(false);
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