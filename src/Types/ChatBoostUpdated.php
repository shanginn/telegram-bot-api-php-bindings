<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a boost added to a chat or changed.
 */
class ChatBoostUpdated implements TypeInterface
{
    /**
     * @param Chat      $chat  Chat which was boosted
     * @param ChatBoost $boost Infomation about the chat boost
     */
    public function __construct(
        public Chat $chat,
        public ChatBoost $boost,
    ) {
    }
}
