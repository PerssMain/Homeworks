<?php

namespace PerssMain\Src\Homework_12;

/**
 * IoC интерфейс.
 */
interface IoCInterface
{
    /**
     * Универсальный метод для регистрации/получения зависимости и создание/переключения на scopes.
     *
     * @param string $key
     * @param        ...$args
     * @return mixed
     */
    public function resolve(string $key, ...$args): mixed;
}
