<?php

namespace PerssMain\Src\Homework_4;

use PerssMain\Src\Homework_2\Objects\MovableAdapter;
use PerssMain\Src\Homework_2\Objects\UObject;
use PerssMain\Src\Homework_3\Commands\RepeatedCommand;
use PerssMain\Src\Homework_3\IoC;
use PerssMain\Src\Homework_4\Adapters\FuelReducibleAdapter;
use PerssMain\Src\Homework_4\Commands\BurnFuelCommand;
use PerssMain\Src\Homework_4\Commands\Command;
use PerssMain\Src\Homework_4\Commands\LinearMotionMacroCommand;
use PerssMain\Src\Homework_4\Commands\CheckFuelCommand;
use PerssMain\Src\Homework_4\Commands\MacroCommand;
use PerssMain\Src\Homework_4\Commands\MoveCommand;
use PerssMain\Src\Homework_4\Commands\RepeatCommand;

class MacroCommandsProvider
{
    public static function initMacroCommand()
    {
        $setUp = [
            LinearMotionMacroCommand::class => [
                MoveCommand::class,
                CheckFuelCommand::class,
                BurnFuelCommand::class,
            ]
        ];

        IoC::getInstance()->set(MoveCommand::class, static function (UObject $obj) {
            $adapter = new MovableAdapter($obj);
            return new MoveCommand($adapter);
        });
        IoC::getInstance()->set(CheckFuelCommand::class, static function (UObject $obj) {
            $adapter = new FuelReducibleAdapter($obj);
            return new CheckFuelCommand($adapter);
        });
        IoC::getInstance()->set(CheckFuelCommand::class, static function (UObject $obj) {
            $adapter = new FuelReducibleAdapter($obj);
            return new BurnFuelCommand($adapter);
        });
        IoC::getInstance()->set(RepeatCommand::class, static function (MacroCommand $macroCommand) {
            return new RepeatCommand($macroCommand);
        });

        IoC::getInstance()->set(
            LinearMotionMacroCommand::class,
            function (UObject $obj) use ($setUp) {
                $macro = new MacroCommand();
                $commands = array_map(
                    fn($className): Command => IoC::getInstance()->get($className, [$obj]),
                    $setUp[LinearMotionMacroCommand::class],
                );
                array_push($commands, IoC::getInstance()->get(RepeatCommand::class, [$macro]));
                $macro->setCommands($commands);

                return $macro;
            }
        );
    }
}
