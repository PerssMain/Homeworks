<?php

namespace PerssMain\Src\IoC;

/**
 * Интерфейс scope.
 */
interface ScopeInterface
{
    /** Возвращает имя scope */
    public function getName(): string;

    /** Добавляет зависимость в scope  */
    public function addDependency(string $key, callable $dependencyCallable): void;

    /** Разрешает зависимости */
    public function resolve(string $key, ...$args): mixed;
}
