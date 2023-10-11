<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents the scope to which bot commands are applied. Currently, the following 7 scopes are supported:.
 */
abstract class BotCommandScope implements TypeInterface
{
    public function __construct()
    {
    }

    public static function fromResponseResult(array $result): self
    {
        return new self();
    }
}
