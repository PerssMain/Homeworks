<?php

namespace PerssMain\Src\Homework_3\Commands;

class RepeatedCommand implements Command
{
    public Command $originalCommand;

    private int $counter = 0;

    public function __construct(Command $command)
    {
        $this->originalCommand = $command;
    }

    public function execute()
    {
        $this->counter++;
        $this->originalCommand->execute();
    }

    public function getCount(): int
    {
        return $this->counter;
    }
}
