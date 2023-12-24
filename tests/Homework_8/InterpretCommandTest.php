<?php

namespace Homework_8;

use PerssMain\Src\Homework_2\Moves\Movable;
use PerssMain\Src\Homework_4\Commands\MoveCommand;
use PerssMain\Src\Homework_5\IoC;
use PerssMain\Src\Homework_5\IoCRegister;
use PerssMain\Src\Homework_8\AccessMiddleware;
use PerssMain\Src\Homework_8\InterpretCommand;
use PerssMain\Src\Homework_8\Message;
use PerssMain\Src\Homework_8\ObjectsPool;
use PerssMain\Src\Homework_8\QueueManager;
use PerssMain\Src\Homework_8\RulesManager;
use PerssMain\Src\Homework_8\StandardRulesManager;
use PHPUnit\Framework\TestCase;

class InterpretCommandTest extends TestCase
{
    public function setUp(): void
    {
        IoC::resolve(IoC::IOC_REGISTER, IoC::IOC_REGISTER, static function () {
            return new IoCRegister();
        })->execute();
        IoC::resolve(IoC::IOC_REGISTER, RulesManager::class, function () {
            return new StandardRulesManager();
        })->execute();

        parent::setUp();
    }

    public function testExecute()
    {
        $authToken = 'authToken';
        $objectId = 1234;
        $operationAlias = 'Tank.move';
        $playerType = 'demoPlayer';

        $queueMock = $this->createMock(QueueManager::class);
        $queueMock->method('pushCommand')->with(
            $this->callback(function ($command) {
                $this->assertEquals(MoveCommand::class, get_class($command));
                return true;
            })
        );
        IoC::resolve(IoC::IOC_REGISTER, AccessMiddleware::class, function () use ($playerType) {
            $mock = $this->createMock(AccessMiddleware::class);
            $mock->method('getPlayerType')
                ->willReturn($playerType);

            return $mock;
        })->execute();

        IoC::resolve(IoC::IOC_REGISTER, QueueManager::class, function () use ($queueMock) {
            return $queueMock;
        })->execute();

        IoC::resolve(IoC::SCOPE_CURRENT, $playerType);
        if (empty(IoC::$scopes[$playerType])) {
            IoC::resolve(IoC::IOC_REGISTER, IoC::IOC_REGISTER, static function () {
                return new IoCRegister();
            })->execute();
        }
        IoC::resolve(IoC::IOC_REGISTER, ObjectsPool::class, function () {
            return $this->createMock(ObjectsPool::class);
        })->execute();
        IoC::resolve(IoC::SCOPE_CURRENT, IoC::DEFAULT_SCOPE);
        $message = $this->createMock(Message::class);
        $message->method('getAuthToken')->willReturn($authToken);
        $message->method('getObjetId')->willReturn($objectId);
        $message->method('getOperationAlias')->willReturn($operationAlias);
        $command = new InterpretCommand($message);
        $command->execute();
    }
}
