<?php

namespace Broker\Commands\Kafka;

use Illuminate\Console\Command;
use Broker;

class PublisherCommand extends Command
{

    public $signature = 'kafka:publish {topic}';

    public function handle()
    {
        Broker::publish($this->argument('topic'), $this->argument('message'));
    }
}