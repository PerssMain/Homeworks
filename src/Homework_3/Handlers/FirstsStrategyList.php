<?php

namespace PerssMain\Src\Homework_3\Handlers;

use Exception;
use PerssMain\Src\Homework_3\Commands\Command;
use PerssMain\Src\Homework_3\Commands\RepeatedCommand;
use Throwable;

class FirstsStrategyList
{
    public static function all(): array
    {
        return [
            Exception::class =>
                static function (Command $command, Throwable $throwable): void {
                    (new Repeat())->handle($command, $throwable);
                },

            md5(RepeatedCommand::class . Exception::class) =>
                static function (Command $command, Throwable $throwable): void {
                    (new Log())->handle($command, $throwable);
                },
        ];
    }
}
