<?php

namespace PerssMain\Tests\Homework_5;

use PerssMain\Src\Homework_5\SortProgram;
use PHPUnit\Framework\TestCase;

class SortProgramTest extends TestCase
{
    private $fileSystem;
    private $fileIn;
    private $fileOut;
    private $inputList;
    private $orderedInputList;

    protected function setUp(): void
    {
        $this->fileSystem = new MemoryFileSystem();
        $this->fileIn = 'in.txt';
        $this->fileOut = 'out.txt';
        $this->inputList = array_map(function () {
            return random_int(0, 100);
        }, range(1, 50));
        $this->orderedInputList = $this->inputList;
        sort($this->orderedInputList);

        $this->fileSystem->file($this->fileIn)
            ->create()
            ->write(implode(';', $this->inputList));
    }

    public function testSortProgram(): void
    {
        $sortMethods = ['selection', 'merge', 'insertion'];

        foreach ($sortMethods as $sortMethod) {
            $sortProgram = new SortProgram($this->fileIn, $this->fileOut, $sortMethod, $this->fileSystem);
            $sortProgram->execute();

            $outputFile = $this->fileSystem->file($this->fileOut);
            $this->assertTrue($outputFile->exists());

            $outputResult = $outputFile->read();
            $this->assertStringContainsString($sortMethod, $outputResult);
            $this->assertStringContainsString(implode(';', $this->orderedInputList), $outputResult);
        }
    }
}
