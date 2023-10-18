<?php

namespace Shanginn\TelegramBotApiBindings;

interface TelegramBotApiClientInterface
{
    public function sendRequest(string $method, string $json): mixed;

    public function serialize(mixed $data): string;

    public function deserialize(string $data, array $types): mixed;
}
