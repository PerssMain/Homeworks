<?php

namespace PerssMain\Src\Homework_8;

use PerssMain\Src\Homework_4\Commands\Command;

interface QueueManager
{
    public function pushCommand(Command $command);

    public function setGameId(int $gameId);
}
