<?php

namespace PerssMain\Src\Homework_4\Commands;

use PerssMain\Src\Homework_2\Moves\Movable;

class MoveCommand implements Command
{
    public Movable $o;

    public function __construct(Movable $o)
    {
        $this->o = $o;
    }

    public function execute()
    {
        $position = $this->o->getPosition();
        $velocity = $this->o->getVelocity();
        $this->o->setPosition($position->plus($velocity));
    }
}
