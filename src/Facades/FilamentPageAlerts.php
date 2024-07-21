<?php

namespace EightyNine\FilamentPageAlerts\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \EightyNine\FilamentPageAlerts\FilamentPageAlerts
 */
class FilamentPageAlerts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \EightyNine\FilamentPageAlerts\FilamentPageAlerts::class;
    }
}
