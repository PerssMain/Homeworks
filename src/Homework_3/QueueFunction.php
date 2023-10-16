<?php

namespace PerssMain\Src\Homework_3;

use PerssMain\Src\Homework_3\Commands\Command;

interface QueueFunction
{
    public function push(Command $command);

    public function get(): Command;
}
