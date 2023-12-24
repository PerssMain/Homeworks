<?php
namespace PerssMain\Src\Homework_12\Command;

/**
 * Команда для выстрела.
 */
class FireCommand implements CommandInterface
{
    public function __construct(
        private object $object,
        private int $fireDirection
    )
    {
    }

    public function execute(): void
    {
        $this->object->fireDirection = $this->fireDirection;
    }
}
