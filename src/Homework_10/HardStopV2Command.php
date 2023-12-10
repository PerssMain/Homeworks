<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_10;

use PerssMain\Src\Homework_7\HardStopCommand;

class HardStopV2Command extends HardStopCommand implements ProcessorStateInterface
{
    public function next(ProcessorInterface $processor): ?ProcessorStateInterface
    {
        $this->changeState($processor, null);

        return null;
    }

    public function changeState(ProcessorInterface $processor, ?ProcessorStateInterface $state): void
    {
        $processor->changeState($state);
    }
}
