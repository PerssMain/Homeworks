<?php

namespace PerssMain\Src\Homework_8;

use PerssMain\Src\Homework_8\Commands\Command;

interface RulesManager
{
    public function getCommand(string $playerType, string $operationAlias, array $args): Command;
}
