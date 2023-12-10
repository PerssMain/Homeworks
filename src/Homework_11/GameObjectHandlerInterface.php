<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_11;

interface GameObjectHandlerInterface
{
    public function setNext(GameObjectHandlerInterface $handler): GameObjectHandlerInterface;

    public function next(PlayingFieldsDto $playingFieldsDto): null|bool|GameObjectHandlerInterface;
}
