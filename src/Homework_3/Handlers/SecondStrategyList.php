<?php

namespace PerssMain\Src\Homework_3\Handlers;

use Exception;
use PerssMain\Src\Homework_3\Commands\Command;
use PerssMain\Src\Homework_3\Commands\RepeatedCommand;
use PerssMain\Src\Homework_3\IoC;
use PerssMain\Src\Homework_3\QueueFunction;
use Throwable;

class SecondStrategyList
{
    public static function all(): array
    {
        return [
            md5(RepeatedCommand::class . Exception::class) =>
                static function (RepeatedCommand $command, Throwable $throwable): void {
                    if ($command->getCount() < 3) {
                        $commandQueue = IoC::getInstance()->get(QueueFunction::class);
                        $commandQueue->push($command);
                    } else {
                        (new Log())->handle($command, $throwable);
                    }
                },

            Exception::class =>
                static function (Command $command, Throwable $throwable): void {
                    (new Repeat())->handle($command, $throwable);
                },
        ];
    }
}
