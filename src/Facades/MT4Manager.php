<?php

namespace D4T\MT4Sdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \D4T\MT4Sdk\MT4Sdk
 */
class MT4Manager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \D4T\MT4Sdk\Manager::class;
    }
}
