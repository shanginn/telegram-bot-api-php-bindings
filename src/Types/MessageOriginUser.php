<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The message was originally sent by a known user.
 */
class MessageOriginUser extends MessageOrigin
{
    /**
     * @param string $type       Type of the message origin, always “user”
     * @param int    $date       Date the message was sent originally in Unix time
     * @param User   $senderUser User that sent the message originally
     */
    public function __construct(
        public string $type,
        public int $date,
        public User $senderUser,
    ) {
    }
}
