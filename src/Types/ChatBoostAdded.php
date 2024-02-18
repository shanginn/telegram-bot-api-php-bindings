<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a user boosting a chat.
 */
class ChatBoostAdded implements TypeInterface
{
    /**
     * @param int $boostCount Number of boosts added by the user
     */
    public function __construct(
        public int $boostCount,
    ) {
    }
}
