<?php

namespace PerssMain\Src\Homework_12;

use PerssMain\Src\Homework_12\UObject;
use PerssMain\Src\Homework_5\IoC;
use PerssMain\Src\Homework_6\AdapterCreator;
use ReflectionMethod;
use ReflectionParameter;

class Interpreter
{
    public const GET_COMMAND_CLASS = 'GetCommandClass';

    public function interpret(IGameOrder $gameOrder)
    {
        $commandClass = IoC::resolve(self::GET_COMMAND_CLASS, [$gameOrder->getAction()]);

        $rMethod = new ReflectionMethod($commandClass, '__construct');
        $params = $rMethod->getParameters();
        $uObject = new UObject();
        $uObject->setProperty('id', $gameOrder->getId());

        foreach ($gameOrder->getParams() as $key => $param) {
            $uObject->setProperty($key, $param);
        }

        $constructorParams = [];
        /** @var ReflectionParameter $param */
        foreach ($params as $param) {
            $className = $param->getType()->getName();
            $constructorParams[] = AdapterCreator::create($className, $uObject);
        }

        return new $commandClass(...$constructorParams);
    }
}
