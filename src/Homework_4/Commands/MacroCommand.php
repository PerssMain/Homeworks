<?php

namespace PerssMain\Src\Homework_4\Commands;

use Exception;
use PerssMain\Src\Homework_3\Commands\Command;
use PerssMain\Src\Homework_4\CommandException;

class MacroCommand implements Command
{
    protected array $commands;

    public function setCommands(array $commands)
    {
        $this->commands = $commands;
    }

    /**
     * @throws CommandException
     */
    public function execute()
    {
        /** @var Command $command */
        foreach ($this->commands as $command) {
            try {
                $command->execute();
            } catch (Exception $e) {
                throw new CommandException($e->getMessage());
            }
        }
    }
}
