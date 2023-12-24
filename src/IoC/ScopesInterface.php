<?php

namespace PerssMain\Src\IoC;

/**
 * Интерфейс scopes.
 */
interface ScopesInterface
{
    /** Создание scope */
    public function createScope(string $scopeName): void;

    /** Возвращает текущий scope */
    public function getCurrentScope(): ScopeInterface;

    /** Установление текущего scope */
    public function setCurrentScope(string $scopeName): void;
}
