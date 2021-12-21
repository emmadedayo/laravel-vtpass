<?php

namespace Emmadedayo\VtPass\Facades;

use Illuminate\Support\Facades\Facade;
use Emmadedayo\VtPass\Request;
use Emmadedayo\VtPass\Traits\HasQuery;

class Vtpass extends Facade
{
    use Request, HasQuery;

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'vtpass';
    }
}
