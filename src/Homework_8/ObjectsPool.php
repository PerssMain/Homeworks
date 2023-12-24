<?php

namespace PerssMain\Src\Homework_8;

use PerssMain\Src\Homework_2\Objects\UObject;

interface ObjectsPool
{
    public function getObject(string $id): UObject;

    public function setObject(string $type, array $params): void;
}
