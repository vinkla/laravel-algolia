<?php

namespace Vinkla\Algolia\Facades;

use Illuminate\Support\Facades\Facade;

class Algolia extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'algolia';
    }
}
