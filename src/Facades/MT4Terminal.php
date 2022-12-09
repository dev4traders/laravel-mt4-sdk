<?php

namespace D4T\MT4Sdk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see D4T\MT4Sdk\Terminal
 * @method static string apiToken()
 * @method static string endpoint()
 * @method static TerminalAccountCredentails createAccount(TerminalAccountCreateRequest $request)
 * @method static mixed parseSrv(string $srvFileData)
 */
class MT4Terminal extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \D4T\MT4Sdk\Terminal::class;
    }
}
