<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_11;

/**
 * ДТО игрового объекта
 */
final class GameObjectDto
{
    /**
     *
     * @param string $name
     * @param int    $position
     */
    public function __construct(
        public string $name,
        public int    $position,
    )
    {
    }
}
