<?php

namespace PerssMain\Src\Homework_3;

interface Logger
{
    public function printInfo(string $text, int $code, string $commandName);
}
