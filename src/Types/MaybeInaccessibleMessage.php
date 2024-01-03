<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes a message that can be inaccessible to the bot. It can be one of.
 */
abstract class MaybeInaccessibleMessage implements TypeInterface
{
    public function __construct()
    {
    }
}
