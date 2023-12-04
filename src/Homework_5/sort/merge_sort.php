<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_5\Sort;


interface Sortable
{
    public function sort(): array;
}

class MergeSort implements Sortable
{
    private $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    public function sort(): array
    {
        $resultList = $this->list;
        return $this->mergeSort($resultList);
    }

    private function merge($left, $right): array
    {
        $arr = [];
        while (!empty($left) && !empty($right)) {
            if ($left[0] < $right[0]) {
                $arr[] = array_shift($left);
            } else {
                $arr[] = array_shift($right);
            }
        }

        return array_merge($arr, $left, $right);
    }

    private function mergeSort($list): array
    {
        if (count($list) < 2) {
            return $list;
        }

        $half = round(count($list) / 2);
        $left = array_slice($list, 0, $half);
        array_splice($list, 0, $half);
        return $this->merge($this->mergeSort($left), $this->mergeSort($list));
    }

    public function getMethodName(): string
    {
        return 'merge';
    }
}
