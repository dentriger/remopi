<?php

namespace Remopi;

use Illuminate\Support\Facades\Facade;

class Remopi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'remopi';
    }
}
