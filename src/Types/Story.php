<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a message about a forwarded story in the chat. Currently holds no information.
 */
class Story implements TypeInterface
{
    public function __construct()
    {
    }

    public static function fromResponseResult(array $result): self
    {
        return new self();
    }
}
