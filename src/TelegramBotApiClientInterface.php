<?php

namespace Shanginn\TelegramBotApiBindings;

use Shanginn\TelegramBotApiBindings\Types\TypeInterface;

interface TelegramBotApiClientInterface
{
    public function sendRequest(string $method, array $args): mixed;

    /**
     * @param array<string> $returnTypes
     *
     * @return TypeInterface|array<TypeInterface>|bool|string|int
     */
    public function convertResponseToType(mixed $response, array $returnTypes): TypeInterface|array|int|string|bool;
}
