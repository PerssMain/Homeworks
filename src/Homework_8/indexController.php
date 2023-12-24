<?php

namespace PerssMain\Src\Homework_8;

use PerssMain\Src\Homework_5\IoC;

class indexController
{
    /**
     * @param Message $message
     */
    public function indexAction(Message $message)
    {
        $command = new InterpretCommand($message);
        /** @var QueueManager $queueManager */
        $queueManager = IoC::resolve(QueueManager::class, ['queueId' => $message->getGameId()]);
        $queueManager->pushCommand($command);
        $this->sendResponse();
    }

    public function sendResponse()
    {

        // close socket connection
    }
}
