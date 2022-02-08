<?php

namespace App\Broker;

use App\Broker\Kafka\KafkaBroker;
use App\Broker\Log\LogBroker;
use Exception;
use Illuminate\Support\ServiceProvider;

class BrokerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind('broker', function () {
            if (config('broker::driver') == 'log') {
                return new LogBroker();
            }
            if (config('broker::driver') == 'kafka') {
                return new KafkaBroker();
            }

            throw new Exception('Broker driver not defined.');
        });
    }
}
