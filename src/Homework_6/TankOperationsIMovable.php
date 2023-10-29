<?php

namespace PerssMain\Src\Homework_6;

use PerssMain\Src\Homework_2\Data\Vector;

interface TankOperationsIMovable
{
    public function getPosition(): Vector;

    public function setPosition(Vector $newValue);

    public function getVelocity(): Vector;
}
