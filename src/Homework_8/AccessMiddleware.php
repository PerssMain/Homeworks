<?php

namespace PerssMain\Src\Homework_8;

interface AccessMiddleware
{
    public function getPlayerType(string $authToken): string;
}
