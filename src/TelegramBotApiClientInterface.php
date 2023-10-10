<?php

namespace Shanginn\TelegramBotApiBindings;

interface TelegramBotApiClientInterface
{
	function sendRequest(string $method, array $args): mixed;
}
