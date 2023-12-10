<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_11;

abstract class AbstractGameObjectHandler implements GameObjectHandlerInterface
{
    private ?GameObjectHandlerInterface $nextHandler = null;

    public function setNext(GameObjectHandlerInterface $handler): GameObjectHandlerInterface
    {
        $this->nextHandler = $handler;

        return $this->nextHandler;
    }

    public function next(PlayingFieldsDto $playingFieldsDto): null|bool|GameObjectHandlerInterface
    {
        return $this->nextHandler?->next($playingFieldsDto);
    }
}
