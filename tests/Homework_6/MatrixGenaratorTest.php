<?php

namespace PerssMain\Tests\Homework_6;

use PerssMain\Src\Homework_6\classes\writer\WriterInterface;
use PHPUnit\Framework\TestCase;
use PerssMain\Src\Homework_6\classes\matrix\MatrixGenarator;

/**
 * Class MatrixGenaratorTest
 * @package Classes\Matrix
 */
class MatrixGenaratorTest extends TestCase
{
    /**
     *
     */
    public function testRun()
    {
        $matrix = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        ];

        $writer = $this->createMock(WriterInterface::class);
        $writer->assertEquals([
                $matrix,
                $matrix,
            ]);

        $matrixGenarator = $this->createMock(MatrixGenarator::class)->makePartial();
        $matrixGenarator->__construct($writer);
        $matrixGenarator->shouldReceive('Generate')
            ->twice()
            ->andReturn($matrix);

        $matrixGenarator->Run();
    }
}
