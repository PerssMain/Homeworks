<?php

namespace PerssMain\Src\Homework_12;

interface IGameOrder
{
    public function getId(): int;

    public function setId(int $id): void;

    public function getAction(): string;

    public function setAction(string $action): void;

    public function getParams(): array;

    public function setParams(array $params): void;
}
