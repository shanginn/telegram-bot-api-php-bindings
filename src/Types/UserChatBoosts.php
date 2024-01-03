<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a list of boosts added to a chat by a user.
 */
class UserChatBoosts implements TypeInterface
{
    /**
     * @param array<ChatBoost> $boosts The list of boosts added to the chat by the user
     */
    public function __construct(
        public array $boosts,
    ) {
    }
}
