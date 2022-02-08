<?php

namespace App\Broker\Log;

use App\Broker\BrokerContract;
use Illuminate\Support\Facades\Log;

class LogBroker implements BrokerContract
{
    public function consume(string $topic, callable $handler = null)
    {
        Log::info("Consuming data of topic {$topic}");
    }

    public function publish(string $topic, string $message)
    {
        Log::info("Publishing {$message} on topic {$topic}");
    }
}
