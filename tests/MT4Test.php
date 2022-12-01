<?php

use D4T\MT4Sdk\Facades\MT4Manager;
use D4T\MT4Sdk\MT4SdkServiceProvider;

it('can get mt4sdk instance', function () {
    (new MT4SdkServiceProvider($this->app))->bootingPackage();

    config()->set('mt4-sdk', [
        'api_token' => 'fake-token',
        'endpoint' => 'fake-endpoint',
    ]);

    $token = MT4Manager::apiToken();

    expect($token)->toBe('fake-token');
});
