<?php

namespace PerssMain\Src\Homework_4\Adapters;

use PerssMain\Src\Homework_2\Objects\UObject;
use PerssMain\Src\Homework_4\Objects\FuelReducible;

class FuelReducibleAdapter implements FuelReducible
{
    public UObject $object;

    public function __construct(UObject $o)
    {
        $this->object = $o;
    }

    public function setFuelLevel(int $fuelLevel)
    {
        return $this->object->setProperty('FuelLevel', $fuelLevel);
    }

    public function getFuelLevel(): int
    {
        return $this->object->getProperty('FuelLevel');
    }

    public function getFuelConsumption(): int
    {
        return $this->object->getProperty('FuelConsumption');
    }
}
