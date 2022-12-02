<?php

namespace Tests;

use Mockery;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

class MT4SDKTest extends TestCase
{
    use CreatesApplication;

    protected function tearDown(): void
    {
        Mockery::close();
    }

}
