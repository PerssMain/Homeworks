<?php

namespace PerssMain\Tests\Homework_4;

use Exception;
use PerssMain\Src\Homework_2\Data\Vector;
use PerssMain\Src\Homework_2\Moves\Rotatable;
use PerssMain\Src\Homework_3\Commands\Command;
use PerssMain\Src\Homework_4\Commands\BurnFuelCommand;
use PerssMain\Src\Homework_4\Commands\ChangeVelocityCommand;
use PerssMain\Src\Homework_4\Commands\CheckFuelCommand;
use PerssMain\Src\Homework_4\CommandException;
use PerssMain\Src\Homework_4\Commands\MacroCommand;
use PerssMain\Src\Homework_4\MacroCommandsProvider;
use PerssMain\Src\Homework_4\Objects\FuelReducible;
use PHPUnit\Framework\TestCase;

class MacroCommandTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        MacroCommandsProvider::initMacroCommand();
    }

    public function testBurnFuelCommand()
    {
        $object = $this->createMock(FuelReducible::class);
        $object->method('getFuelLevel')->willReturn(3);
        $object->method('getFuelConsumption')->willReturn(1);
        $object->method('setFuelLevel')->with($this->equalTo(2));
        $cmd = new BurnFuelCommand($object);
        $cmd->execute();
        $this->assertEquals(1, 1);
    }

    public function testCheckFuelCommand0()
    {
        $object = $this->createMock(FuelReducible::class);
        $this->expectException(Exception::class);
        $object->method('getFuelLevel')->willReturn(0);
        $cmd = new CheckFuelCommand($object);
        $cmd->execute();
    }

    public function testCheckFuelCommand1()
    {
        $object = $this->createMock(FuelReducible::class);
        $object->method('getFuelLevel')->willReturn(1);
        $cmd = new CheckFuelCommand($object);
        $cmd->execute();
        $this->assertTrue(true);
    }

    public function testCheckFuelCommand2()
    {
        $this->expectException(Exception::class);
        $object = $this->createMock(FuelReducible::class);
        $object->method('getFuelLevel')->willReturn(-1);
        $cmd = new CheckFuelCommand($object);
        $cmd->execute();
    }

    public function testMacroCommand()
    {
        $moveCmd = $this->createMock(Command::class);
        $checkFuelCmd = $this->createMock(Command::class);
        $this->expectException(CommandException::class);
        $checkFuelCmd->method('execute')
            ->will($this->throwException(new CommandException()));
        $burnFuelCmd = $this->createMock(Command::class);
        $burnFuelCmd->expects($this->never())->method('execute');
        $commands = [
            $moveCmd,
            $checkFuelCmd,
            $burnFuelCmd,
        ];
        $macroCommand = new MacroCommand();
        $macroCommand->setCommands($commands);
        $macroCommand->execute();
    }

    public function testChangeVelocity()
    {
        $rotatable = $this->createMock(Rotatable::class);
        $rotatable->method('getDirection')
            ->willReturn(1);
        $rotatable->method('getDirectionsNumber')
            ->willReturn(8);
        $rotatable->method('getSpeedValue')
            ->willReturn(1);
        $rotatable->method('setVelocity')
            ->with($this->equalTo(new Vector(0.0, 1.0)));

        $rotate = new ChangeVelocityCommand($rotatable);
        $rotate->execute();
        $this->assertEquals(1, 1);
    }
}
