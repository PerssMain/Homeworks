<?php

declare(strict_types=1);

namespace PerssMain\Src\Homework_12\Interpreter;

/**
 * Интерфейс интерпретатора.
 */
interface InterpreterInterface
{
    /**
     * Интерпретация приказа.
     *
     * @param object $order
     * @return mixed
     */
    public function interpret(object $order): mixed;
}
