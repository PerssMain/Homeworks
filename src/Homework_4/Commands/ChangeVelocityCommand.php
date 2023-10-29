<?php

namespace PerssMain\Src\Homework_4\Commands;

use PerssMain\Src\Custom\CustomFloat;
use PerssMain\Src\Homework_2\Data\Vector;
use PerssMain\Src\Homework_2\Moves\Rotatable;

class ChangeVelocityCommand implements Command
{
    public Rotatable $o;

    public function __construct(Rotatable $o)
    {
        $this->o = $o;
    }

    public function execute()
    {
        $direction = $this->o->getDirection();
        $directionNumber = $this->o->getDirectionsNumber();
        $direction = ($direction + 1) % $directionNumber;
        $this->o->setDirection($direction);

        $speed = $this->o->getSpeedValue();
        $x = $speed * CustomFloat::cos(deg2rad(360 / $directionNumber * $direction));
        $y = $speed * CustomFloat::sin(deg2rad(360 / $directionNumber * $direction));
        $this->o->setVelocity(new Vector($x, $y));
    }
}
