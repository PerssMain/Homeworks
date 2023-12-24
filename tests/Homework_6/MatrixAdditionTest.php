<?php

namespace PerssMain\Tests\Homework_6;

use PerssMain\Src\Homework_6\classes\reader\ReaderInterface;
use PerssMain\Src\Homework_6\classes\writer\WriterInterface;
use PerssMain\Src\Homework_6\classes\matrix\MatrixAddition;
use PHPUnit\Framework\TestCase;
use Mockery;

/**
 * Class MatrixGenaratorTest
 * @package Classes\Matrix
 */
class MatrixAdditionTest extends TestCase
{
    /**
     *
     */
    public function testAdd()
    {
        $reader = Mockery::mock(ReaderInterface::class);
        $writer = Mockery::mock(WriterInterface::class);

        $matrixAddition = new MatrixAddition($reader, $writer);

        $matrixIn1 = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
        ];
        $matrixIn2 = [
            [9, 8, 7],
            [6, 5, 4],
            [3, 2, 1],
        ];
        $matrixActual = $matrixAddition->Add($matrixIn1, $matrixIn2);

        $expectedMatrix = [
            [10, 10, 10],
            [10, 10, 10],
            [10, 10, 10],
        ];
        $this->assertEquals($expectedMatrix, $matrixActual);
    }
}
