<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a forum topic closed in the chat. Currently holds no information.
 */
class ForumTopicClosed implements TypeInterface
{
    public function __construct()
    {
    }

    public static function fromResponseResult(array $result): self
    {
        return new self();
    }
}
