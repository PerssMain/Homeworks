<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PerssMain\Src\Homework_7\BlockingCollection;
use PerssMain\Src\Homework_7\Processable;
use PerssMain\Src\Homework_7\TestCommand;
use PerssMain\Src\Homework_10\HardStopV2Command;
use PerssMain\Src\Homework_10\MoveToCommand;
use PerssMain\Src\Homework_10\Processor;
use PerssMain\Src\Homework_10\RunCommand;
use PerssMain\Src\Homework_10\RunState;

class HomeworkTenTest extends TestCase
{
    /**
     * Тест, который проверяет, что после команды hard stop, поток завершается.
     *
     * @return void
     */
    public function testOne(): void
    {
        $queue = new BlockingCollection();
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());

        $processable = new Processable($queue);
        $queue->add(new HardStopV2Command($processable));
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());

        $processor = new Processor($queue, new RunState());
        $processor->run();

        $this->assertEquals(
            4,
            $processor->getCountExecutedCommandInRunState(),
            'Команда HardStopCommand не отработала.'
        );
    }

    /**
     * Тест, который проверяет, что после команды MoveToCommand, поток переходит
     * на обработку Команд с помощью состояния MoveTo
     *
     * @return void
     */
    public function testTwo(): void
    {
        $queue = new BlockingCollection();
        $queue->add(new TestCommand());

        $queue->add(new MoveToCommand());
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());

        $processor = new Processor($queue, new RunState());
        $processor->run();

        $this->assertEquals(
            3,
            $processor->getCountExecutedCommandInMoveToState(),
            'Количество выполненных команд не равно ожидаемому результату.'
        );
    }

    /**
     * Тест, который проверяет, что после команды RunCommand, поток переходит
     * на обработку Команд с помощью состояния "Обычное"
     *
     * @return void
     */
    public function testThree(): void
    {
        $queue = new BlockingCollection();
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());

        $queue->add(new MoveToCommand());
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());

        $queue->add(new RunCommand());
        $queue->add(new TestCommand());
        $queue->add(new TestCommand());

        $processor = new Processor($queue, new RunState());
        $processor->run();

        $this->assertEquals(
            6,
            $processor->getCountExecutedCommandInRunState(),
            'Главный процессор обработки очереди не переключил обратно в состояние RunState.'
        );
    }
}
