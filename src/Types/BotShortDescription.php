<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents the bot's short description.
 */
class BotShortDescription implements TypeInterface
{
    /**
     * @param string $shortDescription The bot's short description
     */
    public function __construct(
        public string $shortDescription,
    ) {
    }
}
