<?php

namespace Shanginn\TelegramBotApiBindings;

interface TelegramBotApiClientInterface
{
    public function sendRequest(string $method, string $json): PromiseInterface;
}
