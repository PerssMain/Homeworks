<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_11;

interface CommandInterface
{
    public function execute(PlayingFieldsDto $playingFieldsDto);
}
