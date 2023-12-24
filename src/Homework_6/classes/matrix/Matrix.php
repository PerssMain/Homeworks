<?php

namespace PerssMain\Src\Homework_6\classes\matrix;

/**
 * Class Matrix
 */
final class Matrix
{
    /**
     * @var MatrixOperationInterface
     */
    private MatrixOperationInterface $operation;

    /**
     * Matrix constructor.
     * @param MatrixOperationInterface $operation
     */
    public function __construct(MatrixOperationInterface $operation)
    {
        $this->operation = $operation;
    }

    /**
     *
     */
    public function Calc(): void
    {
        $this->operation->Run();
    }
}
