<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_5\Sort;

class InsertionSort implements Sortable {
    private $list;

    public function __construct($list) {
        $this->list = $list;
    }

    public function sort() {
        $resultList = $this->list;
        for ($i = 1; $i < count($resultList); $i++) {
            for ($j = $i; $j > 0 && $resultList[$j - 1] > $resultList[$j]; $j--) {
                $tmp = $resultList[$j - 1];
                $resultList[$j - 1] = $resultList[$j];
                $resultList[$j] = $tmp;
            }
        }
        return $resultList;
    }

    public function getMethodName() {
        return 'insertion';
    }
}
