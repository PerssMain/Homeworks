<?php

namespace PerssMain\Src\Homework_4\Commands;

use Exception;
use PerssMain\Src\Homework_3\Commands\Command;
use PerssMain\Src\Homework_4\CommandException;
use PerssMain\Src\Homework_4\Objects\FuelReducible;

class CheckFuelCommand implements Command
{
    public FuelReducible $o;

    public function __construct(FuelReducible $o)
    {
        $this->o = $o;
    }

    public function execute()
    {
        if ($this->o->getFuelLevel() <= 0) {
            throw new Exception('Not enough fuel.');
        }
    }
}
