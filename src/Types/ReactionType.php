<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the type of a reaction. Currently, it can be one of.
 *
 * @see ReactionTypeEmoji
 * @see ReactionTypeCustomEmoji
 * @see ReactionTypePaid
 */
abstract class ReactionType implements TypeInterface
{
    public function __construct()
    {
    }
}
