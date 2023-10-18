<?php

namespace Shanginn\TelegramBotApiBindings;

use React\Promise\PromiseInterface;

interface TelegramBotApiClientInterface
{
    public function sendRequest(string $method, string $json): PromiseInterface;

    public function serialize(mixed $data): string;

    public function deserialize(string $data, array $types): mixed;
}
