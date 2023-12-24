<?php

namespace PerssMain\Src\Homework_12;

use PerssMain\Src\Homework_4\Commands\Command;
use PerssMain\Src\Homework_5\IoC;
use PerssMain\Src\Homework_8\QueueManager;

class InterpretOrderCommand implements Command
{
    /** @var IGameOrder */
    public IGameOrder $gameOrder;

    /**
     * @param IGameOrder $orderOrder
     */
    public function __construct(IGameOrder $orderOrder)
    {
        $this->gameOrder = $orderOrder;
    }

    public function execute()
    {
        /** @var AuthManager $authManager */
        $authManager = IoC::resolve(AuthManager::class);
        if (!$authManager->checkAccessToObject($this->gameOrder->getId())) {
            // Попадаем сюда, когда нет доступа к объекту.
            return ;
        }
        // Можно было Interpreter тоже в IoC засунуть, но я считаю это излишне.
        $interpreter = new Interpreter();
        $command = $interpreter->interpret($this->gameOrder);
        if (!empty($command)) {
            /** @var QueueManager $queue */
            $queue = IoC::resolve(QueueManager::class);
            $queue->pushCommand($command);
        }
    }
}
