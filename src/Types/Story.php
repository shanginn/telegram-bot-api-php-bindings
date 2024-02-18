<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a story.
 */
class Story implements TypeInterface
{
    /**
     * @param Chat $chat Chat that posted the story
     * @param int  $id   Unique identifier for the story in the chat
     */
    public function __construct(
        public Chat $chat,
        public int $id,
    ) {
    }
}
