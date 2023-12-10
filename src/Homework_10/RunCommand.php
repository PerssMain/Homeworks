<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_10;

use PerssMain\Src\Homework_7\CommandInterface;

/**
 * Команда для изменения состояние на обычное RunState.
 */
class RunCommand implements CommandInterface, ProcessorStateInterface
{
    public function execute(): void
    {
        // Дополнительная логика команды, например логирование
    }

    public function next(ProcessorInterface $processor): ?ProcessorStateInterface
    {
        echo 'ПРОИЗОШЛА СМЕНА СОСТОЯНИЯ НА RunState<br>';
        $runState = new RunState();
        $this->changeState($processor, $runState);

        return $runState;
    }

    public function changeState(ProcessorInterface $processor, ?ProcessorStateInterface $state): void
    {
        $processor->changeState($state);
    }
}
