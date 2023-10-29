<?php

namespace PerssMain\Src\Homework_4\Commands;

use PerssMain\Src\Homework_3\Commands\Command;
use PerssMain\Src\Homework_3\IoC;
use PerssMain\Src\Homework_3\QueueFunction;

class RepeatCommand implements Command
{
    public MacroCommand $parentMacroCommand;

    public function __construct(MacroCommand $parentMacroCommand)
    {
        $this->parentMacroCommand = $parentMacroCommand;
    }

    public function execute()
    {
        /** @var QueueFunction $queue */
        $queue = IoC::getInstance()->get(QueueFunction::class);
        $queue->push($this->parentMacroCommand);
    }
}
