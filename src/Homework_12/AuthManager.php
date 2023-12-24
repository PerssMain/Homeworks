<?php

namespace PerssMain\Src\Homework_12;

interface AuthManager
{
    public function checkAccessToObject(int $objectId): bool;
}
