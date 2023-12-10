<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_11;

/**
 * Игровое поле с игровыми объектами
 */
final class PlayingFieldDto
{
    /**
     *
     * @param int   $id
     * @param GameObjectDto[] $gameObjects
     */
    public function __construct(
        public int   $id,
        public array $gameObjects
    )
    {
    }
}
