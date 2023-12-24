<?php

namespace PerssMain\Src\Homework_8;

/**
 * Message format
 *
 * json
 * {
 *  "authToken": string,
 *  "gameId": int,
 *  "gameObjectId": int,
 *  "operationAlias": int,
 *  "args": {}
 * }
 */
interface Message
{
    public function getAuthToken(): string;

    public function getGameId(): int;

    public function getObjetId(): int;

    public function getOperationAlias(): string;

    public function getArgs(): array;
}
