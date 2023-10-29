<?php

namespace PerssMain\Src\Homework_4\Adapters;

use PerssMain\Src\Homework_2\Data\Vector;
use PerssMain\Src\Homework_2\Moves\Movable;
use PerssMain\Src\Homework_2\Objects\UObject;

class MovableAdapter implements Movable
{
    public UObject $object;

    public function __construct(UObject $o)
    {
        $this->object = $o;
    }

    public function getPosition(): Vector
    {
        return $this->object->getProperty('position');
    }

    public function getVelocity(): Vector
    {
        return $this->object->getProperty('velocity');
    }

    public function setPosition(Vector $newV)
    {
        $this->object->setProperty('position', $newV);
    }
}
