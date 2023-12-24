<?php

namespace PerssMain\Src\Homework_6\classes\writer;

/**
 * Interface WriterInterface
 * @package classes\writer
 */
interface WriterInterface
{
    /**
     * @param array $matrix
     */
    public function Write(array $matrix): void;
}
