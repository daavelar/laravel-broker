<?php

namespace Kafka\Commands;

use Illuminate\Console\Command;
use Broker;

class ConsumerCommand extends Command
{
    public $signature = 'broker:consume';

    public function handle()
    {
        Broker::consume($this->argument('topic'));
    }
}