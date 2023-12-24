<?php

return [
    'Tank.move' => function ($objectId) {
        /** @var \PerssMain\Src\Homework_8\ObjectsPool $objectPool */
        $objectPool = \OtusDZ\Src\Dz5IoC\IoC::resolve(\OtusDZ\Src\Dz8Messaging\ObjectsPool::class);
        $uObject = $objectPool->getObject($objectId);
        $adaptedUObject = \OtusDZ\Src\Dz6AdapterGen\AdapterCreator::create(
            \OtusDZ\Src\Dz2MoveAndRotate\Moves\Movable::class,
            $uObject
        );

        return new \PerssMain\Src\Homework_4\Commands\MoveCommand($adaptedUObject);
    },
];

