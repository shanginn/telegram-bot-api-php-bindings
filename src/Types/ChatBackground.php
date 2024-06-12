<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a chat background.
 */
class ChatBackground implements TypeInterface
{
    /**
     * @param BackgroundType $type Type of the background
     */
    public function __construct(
        public BackgroundType $type,
    ) {
    }
}
