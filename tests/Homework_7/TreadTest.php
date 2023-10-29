<?php

namespace PerssMain\Tests\Homework_7;

use PerssMain\Src\Homework_4\Commands\Command;
use PerssMain\Src\Homework_5\IoC;
use PerssMain\Src\Homework_5\IoCRegister;
use PerssMain\Src\Homework_7\Runner;
use PerssMain\Src\Homework_7\ThreadManager;
use PHPUnit\Framework\TestCase;
use SplQueue;

class TreadTest extends TestCase
{
    public string $commandDirectory;

    public function setUp(): void
    {
        $this->commandDirectory = __DIR__ . '/../../src/Homework_7/';
        parent::setUp();
    }

    public function testCommand()
    {
        $this->assertTrue(empty($status[1]));
    }

    public function testSoftStop()
    {
        IoC::resolve(IoC::IOC_REGISTER, IoC::IOC_REGISTER, static function () {
            return new IoCRegister();
        })->execute();
        IoC::resolve(IoC::IOC_REGISTER, 'Queue', function () {
            $queue = new SplQueue();

            for ($i = 0; $i < 4; $i++) {
                $command = $this->createMock(Command::class);
                $command->expects($this->once())->method('execute');
                $queue->push($command);
            }

            return $queue;
        })->execute();

        ThreadManager::start();
        ThreadManager::setSignalHandlers();
        ThreadManager::softStop();

        $runner = new Runner();
        $runner->execute();
    }
}



