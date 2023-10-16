<?php

namespace PerssMain\Src\Homework_2\Moves;

use PerssMain\Src\Homework_2\Data\Vector;

interface Rotatable
{
    public function getDirection(): int;

    public function getDirectionsNumber(): int;

    public function getSpeedValue(): int;

    public function setDirection(int $direction): void;

    public function setVelocity(Vector $velocity): void;
}
