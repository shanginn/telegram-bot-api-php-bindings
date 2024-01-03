<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The reaction is based on a custom emoji.
 */
class ReactionTypeCustomEmoji extends ReactionType
{
    /**
     * @param string $type          Type of the reaction, always “custom_emoji”
     * @param string $customEmojiId Custom emoji identifier
     */
    public function __construct(
        public string $type,
        public string $customEmojiId,
    ) {
    }
}
