<?php

namespace PerssMain\Src\Homework_2\Objects;

use PerssMain\Src\Custom\CustomFloat;
use PerssMain\Src\Homework_2\Data\Vector;
use PerssMain\Src\Homework_2\Moves\Movable;

class MovableAdapter implements Movable
{
    public UObject $o;

    public function __construct(UObject $o)
    {
        $this->o = $o;
    }

    public function getPosition(): Vector
    {
        return $this->o->getProperty('position');
    }

    public function setPosition(Vector $newV)
    {
        return $this->o->setProperty('position', $newV);
    }

    public function getVelocity(): Vector
    {
        return $this->o->getProperty('velocity');
    }

    public function getAngularVelocity(): Vector
    {
        $direction = $this->o->getProperty('Direction');
        $directionNumber = $this->o->getProperty('DirectionsNumber');
        $velocity = $this->o->getProperty('Velocity');

        $x = $velocity * CustomFloat::cos(deg2rad(360 / $directionNumber * $direction));
        $y = $velocity * CustomFloat::sin(deg2rad(360 / $directionNumber * $direction));

        return new Vector($x, $y);
    }
}
