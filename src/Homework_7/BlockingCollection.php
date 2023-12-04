<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_7;

class BlockingCollection
{
    /** @var CommandInterface[] */
    private array $queue = [];

    public function add(CommandInterface $command): void
    {
        $this->queue[] = $command;
    }

    public function take(): ?CommandInterface
    {
        return array_shift($this->queue);
    }
}
