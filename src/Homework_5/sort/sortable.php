<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_5\Sort;

interface Sortable {
    public function sort(): array;
    public function getMethodName(): string;
}
