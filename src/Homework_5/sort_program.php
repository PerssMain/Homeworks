<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_5;

use File\File;
use PerssMain\Src\Homework_5\Repository\FileRepository;
use PerssMain\Src\Homework_5\Sort\InsertionSort;
use PerssMain\Src\Homework_5\Sort\MergeSort;
use PerssMain\Src\Homework_5\Repository\Repository;
use PerssMain\Src\Homework_5\Sort\SelectionSort;
use PerssMain\Src\Homework_5\SortIoC;
use PerssMain\Src\Homework_5\Sort\Sortable;

class SortProgram {
    private $pathIn;
    private $pathOut;
    private $sortMethod;
    private $fileSystem;

    public function __construct($pathIn, $pathOut, $sortMethod, $fileSystem = null) {
        $this->pathIn = $pathIn;
        $this->pathOut = $pathOut;
        $this->sortMethod = $sortMethod;
        $this->fileSystem = $fileSystem;
        $this->_initialize();
    }

    private function _initialize() {
        SortIoC::register(
            'repository',
            function ($args) {
                return new FileRepository(
                    $args[0],
                    $args[1],
                    $args[2]
                );
            }
        );
        SortIoC::register('insertion', function ($args) {
            return new InsertionSort($args[0]);
        });
        SortIoC::register('merge', function ($args) {
            return new MergeSort($args[0]);
        });
        SortIoC::register('selection', function ($args) {
            return new SelectionSort($args[0]);
        });
    }

    public function execute() {
        $repository = SortIoC::resolve(
            'repository',
            [$this->pathIn, $this->pathOut, $this->fileSystem]
        );
        $list = explode(';', $repository->readData())
            ->map(function ($e) {
                return intval($e);
            })
            ->toArray();
        $sortable = SortIoC::resolve($this->sortMethod, [$list]);
        $output = $sortable->sort();
        $repository->writeData($sortable->methodName . "\n" . implode(';', $output));
    }
}
