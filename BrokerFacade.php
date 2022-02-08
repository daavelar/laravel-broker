<?php

namespace App\Broker;

use Illuminate\Support\Facades\Facade;

class BrokerFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'broker';
    }
}
