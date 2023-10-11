<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the bot's menu button in a private chat. It should be one of.
 */
abstract class MenuButton implements TypeInterface
{
    public function __construct()
    {
    }

    public static function fromResponseResult(array $result): self
    {
        return new self();
    }
}
