<?php

namespace PerssMain\Src\Homework_2\Moves;

use PerssMain\Src\Homework_2\Data\Vector;

interface Movable
{
    public function getPosition(): Vector;

    public function getVelocity(): Vector;

    public function setPosition(Vector $newV);
}
