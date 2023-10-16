<?php

namespace PerssMain\Src\Homework_3\Handlers;

use PerssMain\Src\Homework_3\Commands\Command;
use Throwable;

interface Handler
{
    public function handle(Command $command, Throwable $throwable);
}
