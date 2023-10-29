<?php

namespace PerssMain\Src\Homework_4\Commands;

use PerssMain\Src\Homework_3\Commands\Command;
use PerssMain\Src\Homework_4\Objects\FuelReducible;

class BurnFuelCommand implements Command
{
    protected FuelReducible $o;

    public function __construct(FuelReducible $o)
    {
        $this->o = $o;
    }

    public function execute()
    {
        $this->o->setFuelLevel($this->o->getFuelLevel() - $this->o->getFuelConsumption());
    }
}
