<?php

namespace PerssMain\Src\Homework_12;

use PerssMain\Src\Homework_2\Moves\Movable;
use PerssMain\Src\Homework_4\Commands\Command;

class StartMove implements Command
{
    public Movable $obj;

    public function __construct(Movable $o)
    {
        $this->obj = $o;
    }

    public function execute()
    {
        // TODO: Implement execute() method.
    }
}
