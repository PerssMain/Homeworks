<?php

namespace PerssMain\Src\Homework_4\Objects;

interface FuelReducible
{
    public function setFuelLevel(int $fuelLevel);

    public function getFuelLevel(): int;

    public function getFuelConsumption(): int;
}
