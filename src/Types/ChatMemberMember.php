<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a chat member that has no additional privileges or restrictions.
 */
class ChatMemberMember extends ChatMember
{
    /**
     * @param string   $status    The member's status in the chat, always “member”
     * @param User     $user      Information about the user
     * @param int|null $untilDate Optional. Date when the user's subscription will expire; Unix time
     */
    public function __construct(
        public string $status,
        public User $user,
        public ?int $untilDate = null,
    ) {
    }
}
