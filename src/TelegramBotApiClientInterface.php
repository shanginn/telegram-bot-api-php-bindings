<?php

namespace Shanginn\TelegramBotApiBindings;

use React\Promise\PromiseInterface;

interface TelegramBotApiClientInterface
{
    public function sendRequest(string $method, string $json): PromiseInterface;
}
