<?php

namespace PerssMain\Src\Homework_2\Moves;

use PerssMain\Src\Custom\CustomFloat;
use PerssMain\Src\Homework_2\Data\Vector;

class Rotate
{
    public Rotatable $r;

    public function rotate(Rotatable $r): self
    {
        $this->r = $r;

        return $this;
    }

    public function execute(): void
    {
        $direction = $this->r->getDirection();
        $directionNumber = $this->r->getDirectionsNumber();
        $direction = ($direction + 1) % $directionNumber;
        $this->r->setDirection($direction);
        $speed = $this->r->getSpeedValue();

        // вот тут надо понять что такое Velocity а что такое direction
        $x = $speed * CustomFloat::cos(deg2rad(360 / $directionNumber * $direction));
        $y = $speed * CustomFloat::sin(deg2rad(360 / $directionNumber * $direction));
        $this->r->setVelocity(new Vector($x, $y));
    }
}
