<?php

namespace App\Broker;

interface BrokerContract
{
    public function consume(string $topic, callable $handler = null);

    public function publish(string $topic, string $message);
}
