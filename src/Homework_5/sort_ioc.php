<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_5;

use File\File;
use File\Local;
use PerssMain\Src\Homework_5\Repository\Repository;

class FileRepository implements Repository {
    private $fileIn;
    private $fileOut;

    public function __construct($pathIn, $pathOut, $fileSystem = null) {
        $fs = $fileSystem ?? new LocalFileSystem();
        $this->fileIn = $fs->file($pathIn);
        $this->fileOut = $fs->file($pathOut);
        if (!$this->fileIn->exists()) {
            throw new \InvalidArgumentException('file not found');
        }
        if (!$this->fileOut->exists()) {
            $this->fileOut->create();
        }
    }

    public function readData() {
        return $this->fileIn->readAsString();
    }

    public function writeData($data) {
        $this->fileOut->writeAsString($data);
    }
}
