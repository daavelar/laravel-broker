<?php

namespace App\Broker;

use Broker\Commands\Kafka\PublisherCommand;
use Broker\Kafka\KafkaBroker;
use Broker\Log\LogBroker;
use Exception;
use Illuminate\Support\ServiceProvider;
use Kafka\Commands\ConsumerCommand;

class BrokerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('broker.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                ConsumerCommand::class,
                PublisherCommand::class,
            ]);
        }

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
