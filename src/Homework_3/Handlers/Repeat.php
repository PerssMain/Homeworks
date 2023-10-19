<?php

namespace PerssMain\Src\Homework_3\Handlers;

use PerssMain\Src\Homework_3\Commands\Command;
use PerssMain\Src\Homework_3\Commands\RepeatedCommand;
use PerssMain\Src\Homework_3\IoC;
use PerssMain\Src\Homework_3\QueueFunction;
use Throwable;

class Repeat implements Handler
{
    public function handle(Command $command, Throwable $throwable)
    {
        $commandQueue = IoC::getInstance()->get(QueueFunction::class);
        $command = new RepeatedCommand($command);
        $commandQueue->push($command);
    }
}
