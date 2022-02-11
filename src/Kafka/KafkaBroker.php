<?php

namespace Broker\Kafka;

use App\Broker\BrokerContract;
use Junges\Kafka\Facades\Kafka;

class KafkaBroker implements BrokerContract
{
    public function consume(string $topic, callable $handler = null, string $group = 'default')
    {
        Kafka::createConsumer()
            ->withHandler(new $handler)
            ->subscribe($topic)
            ->withConsumerGroupId($group)
            ->build()
            ->consume();
    }

    public function publish(string $topic, string $message, array $options = null)
    {
        Kafka::publishOn($topic)->withConfigOptions($options)->send();
    }
}
