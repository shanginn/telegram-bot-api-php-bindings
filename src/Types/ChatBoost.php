<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about a chat boost.
 */
class ChatBoost implements TypeInterface
{
    /**
     * @param string          $boostId        Unique identifier of the boost
     * @param int             $addDate        Point in time (Unix timestamp) when the chat was boosted
     * @param int             $expirationDate Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's Telegram Premium subscription is prolonged
     * @param ChatBoostSource $source         Source of the added boost
     */
    public function __construct(
        public string $boostId,
        public int $addDate,
        public int $expirationDate,
        public ChatBoostSource $source,
    ) {
    }
}
