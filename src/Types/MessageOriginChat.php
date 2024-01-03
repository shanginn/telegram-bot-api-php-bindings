<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The message was originally sent on behalf of a chat to a group chat.
 */
class MessageOriginChat extends MessageOrigin
{
    /**
     * @param string      $type            Type of the message origin, always “chat”
     * @param int         $date            Date the message was sent originally in Unix time
     * @param Chat        $senderChat      Chat that sent the message originally
     * @param string|null $authorSignature Optional. For messages originally sent by an anonymous chat administrator, original message author signature
     */
    public function __construct(
        public string $type,
        public int $date,
        public Chat $senderChat,
        public ?string $authorSignature = null,
    ) {
    }
}
