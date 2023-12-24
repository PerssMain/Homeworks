<?php

return [
    'Tank.move' => function ($objectId) {
        /** @var \OtusDZ\Src\Dz8Messaging\ObjectsPool $objectPool */
        $objectPool = \OtusDZ\Src\Dz5IoC\IoC::resolve(\OtusDZ\Src\Dz8Messaging\ObjectsPool::class);
        $uObject = $objectPool->getObject($objectId);
        $adaptedUObject = \OtusDZ\Src\Dz6AdapterGen\AdapterCreator::create(
            \OtusDZ\Src\Dz2MoveAndRotate\Moves\Movable::class,
            $uObject
        );

        return new \OtusDZ\Src\Dz4MacroCommand\Commands\MoveCommand($adaptedUObject);
    },
];

