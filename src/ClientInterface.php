<?php

namespace Shanginn\TelegramBotApiBindings;

interface ClientInterface
{
    /**
     * @return PromiseInterface<string>
     */
    public function sendRequest(string $method, string $json): PromiseInterface;
}
