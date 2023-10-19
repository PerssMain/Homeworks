<?php

namespace PerssMain\Src\Homework_3\Handlers;

use PerssMain\Src\Homework_3\Commands\Command;
use PerssMain\Src\Homework_3\Commands\LogCommand;
use PerssMain\Src\Homework_3\IoC;
use PerssMain\Src\Homework_3\QueueFunction;
use Throwable;

class Log implements Handler
{
    public function handle(Command $command, Throwable $throwable)
    {
        /** @var QueueFunction $commandQueue */
        $commandQueue = IoC::getInstance()->get(QueueFunction::class);
        $command = new LogCommand($command, $throwable);
        $commandQueue->push($command);
    }
}
