<?php

namespace PerssMain\Src\Homework_3;

use Closure;
use Exception;
use PerssMain\Src\Homework_3\Commands\Command;
use Throwable;

class ExceptionHandler
{
    protected array $handlers = [];

    public function handle(Command $command, Throwable $throwable)
    {
        $handlerKeys = [
            md5(get_class($command) . get_class($throwable)),
            get_class($command),
            Throwable::class,
            Exception::class,
            $throwable->getCode(),
        ];

        $handler = null;
        foreach ($handlerKeys as $key) {
            if (!empty($this->handlers[$key])) {
                $handler = $this->handlers[$key];
                break;
            }
        }

        if (is_array($handler)) {
            foreach ($handler as $item) {
                $item($command, $throwable);
            }
        } else {
            $handler($command, $throwable);
        }
    }

    public function addHandlers(array $handlers)
    {
        foreach ($handlers as $key => $handler) {
            $this->addHandler($key, $handler);
        }
    }

    public function addHandler(string $key, Closure $handler)
    {
        $this->handlers[$key] = $handler;
    }
}
