<?php

namespace PerssMain\Src\Homework_3;

use PerssMain\Src\Homework_3\Handlers\FirstsStrategyList;
use Throwable;

while (true) {
    try {

        /** @var QueueFunction $queue */
        $queue = IoC::getInstance()->get(QueueFunction::class);
        $c = $queue->get();
        $c->execute();

    } catch (Throwable $exception) {
        if (!empty($c)) {
            /** @var ExceptionHandler $handler */
            $handler = IoC::getInstance()->get(ExceptionHandler::class);
            $handler->addHandlers(FirstsStrategyList::all());
            $handler->handle($c, $exception);
        }
    }
}
