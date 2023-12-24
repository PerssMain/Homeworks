<?php

return [
    'Tank.move' => function ($objectId) {
        /** @var \PerssMain\Src\Homework_8\ObjectsPool $objectPool */
        $objectPool = \PerssMain\Src\Homework_5\IoC::resolve(\PerssMain\Src\Homework_8\ObjectsPool::class);
        $uObject = $objectPool->getObject($objectId);
        $adaptedUObject = \PerssMain\Src\Homework_8\AdapterCreator::create(
            \PerssMain\Src\Homework_8\Moves\Movable::class,
            $uObject
        );

        return new \PerssMain\Src\Homework_4\Commands\MoveCommand($adaptedUObject);
    },
];

