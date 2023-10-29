<?php

namespace PerssMain\Src\Homework_5;

use Closure;
use PerssMain\Src\Homework_4\Commands\Command;

class IoCResolveCommand implements Command
{
    protected Closure $func;

    public function __construct(Closure $func)
    {
        $this->func = $func;
    }

    public function execute()
    {
        call_user_func($this->func);
    }
}
