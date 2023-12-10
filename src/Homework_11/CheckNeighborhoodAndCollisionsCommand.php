<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_11;

class CheckNeighborhoodAndCollisionsCommand implements CommandInterface
{
    public function execute(PlayingFieldsDto $playingFieldsDto): void
    {
        $checkNeighborhoodCommand = new CheckNeighborhoodCommand();
        $checkNeighborhoodCommand->setNext(new CheckCollisionsOfGameObjectsCommand());

        while (null !== $checkNeighborhoodCommand->next($playingFieldsDto)) {

        }
    }
}
