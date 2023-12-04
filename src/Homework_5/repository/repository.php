<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_5\Repository;

interface Repository {
    public function readData(): string;
    public function writeData(string $data): void;
}
