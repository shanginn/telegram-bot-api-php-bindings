<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object is received when messages are deleted from a connected business account.
 */
class BusinessMessagesDeleted implements TypeInterface
{
    /**
     * @param string     $businessConnectionId Unique identifier of the business connection
     * @param Chat       $chat                 Information about a chat in the business account. The bot may not have access to the chat or the corresponding user.
     * @param array<int> $messageIds           The list of identifiers of deleted messages in the chat of the business account
     */
    public function __construct(
        public string $businessConnectionId,
        public Chat $chat,
        public array $messageIds,
    ) {
    }
}
