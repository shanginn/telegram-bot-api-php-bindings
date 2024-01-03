<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such code boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 */
class ChatBoostSourceGiftCode extends ChatBoostSource
{
    /**
     * @param string $source Source of the boost, always “gift_code”
     * @param User   $user   User for which the gift code was created
     */
    public function __construct(
        public string $source,
        public User $user,
    ) {
    }
}
