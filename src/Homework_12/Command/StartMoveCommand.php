<?php

namespace PerssMain\Src\Homework_12\Command;

/**
 * Команда для старта движения объекта.
 */
class StartMoveCommand implements CommandInterface
{
    public function __construct(
        private object $object,
        private int $initialVelocity
    )
    {
    }

    public function execute(): void
    {
        $this->object->initialVelocity = $this->initialVelocity;
    }
}
