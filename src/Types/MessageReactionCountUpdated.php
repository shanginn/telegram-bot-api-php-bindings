<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents reaction changes on a message with anonymous reactions.
 */
class MessageReactionCountUpdated implements TypeInterface
{
    /**
     * @param Chat                 $chat      The chat containing the message
     * @param int                  $messageId Unique message identifier inside the chat
     * @param int                  $date      Date of the change in Unix time
     * @param array<ReactionCount> $reactions List of reactions that are present on the message
     */
    public function __construct(
        public Chat $chat,
        public int $messageId,
        public int $date,
        public array $reactions,
    ) {
    }
}
