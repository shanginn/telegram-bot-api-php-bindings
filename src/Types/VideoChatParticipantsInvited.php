<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about new members invited to a video chat.
 */
class VideoChatParticipantsInvited implements TypeInterface
{
    /**
     * @param array<User> $users New members that were invited to the video chat
     */
    public function __construct(
        public array $users,
    ) {
    }
}
