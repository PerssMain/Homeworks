<?php

namespace PerssMain\Src\Homework_5;

use Closure;

interface IoCRegisterInterface
{
    public function get($entityName, ?array $args = []);

    public function set($entityName, Closure $func);
}
