<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_5\Sort;


interface Sortable
{
    public function sort(): array;

    public function getMethodName(): string;
}

class SelectionSort implements Sortable
{
    private $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    public function sort(): array
    {
        $resultList = $this->list;

        for ($i = 0; $i < count($resultList); $i++) {
            $m = $i;
            $j = $i + 1;
            while ($j < count($resultList)) {
                if ($resultList[$j] < $resultList[$m]) {
                    $m = $j;
                }
                $j = $j + 1;
            }
            $tmp = $resultList[$i];
            $resultList[$i] = $resultList[$m];
            $resultList[$m] = $tmp;
        }

        return $resultList;
    }

    public function getMethodName(): string
    {
        return 'selection';
    }
}
