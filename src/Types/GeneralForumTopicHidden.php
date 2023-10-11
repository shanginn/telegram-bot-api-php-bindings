<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about General forum topic hidden in the chat. Currently holds no information.
 */
class GeneralForumTopicHidden implements TypeInterface
{
    public function __construct()
    {
    }

    public static function fromResponseResult(array $result): self
    {
        return new self();
    }
}
