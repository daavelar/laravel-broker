<?php

namespace App\Broker\Kafka;

use App\Broker\BrokerContract;

class KafkaBroker implements BrokerContract
{
    public function consume(string $topic, callable $handler = null)
    {
        // TODO: Implement consume() method.
    }

    public function publish(string $topic, string $message)
    {
        // TODO: Implement publish() method.
    }
}
