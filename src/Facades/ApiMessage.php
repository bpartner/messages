<?php

namespace Bpartner\Messages\Facades;

use Bpartner\Messages\Messages;
use Illuminate\Support\Facades\Facade;

class ApiMessage extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Messages::class;
    }
}
