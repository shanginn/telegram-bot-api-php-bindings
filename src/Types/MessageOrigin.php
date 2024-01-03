<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the origin of a message. It can be one of.
 *
 * @see MessageOriginUser
 * @see MessageOriginHiddenUser
 * @see MessageOriginChat
 * @see MessageOriginChannel
 */
abstract class MessageOrigin implements TypeInterface
{
    public function __construct()
    {
    }
}
