<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a boost removed from a chat.
 */
class ChatBoostRemoved implements TypeInterface
{
    /**
     * @param Chat            $chat       Chat which was boosted
     * @param string          $boostId    Unique identifier of the boost
     * @param int             $removeDate Point in time (Unix timestamp) when the boost was removed
     * @param ChatBoostSource $source     Source of the removed boost
     */
    public function __construct(
        public Chat $chat,
        public string $boostId,
        public int $removeDate,
        public ChatBoostSource $source,
    ) {
    }
}
