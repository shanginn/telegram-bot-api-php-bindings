<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query.
 */
class SwitchInlineQueryChosenChat implements TypeInterface
{
    /**
     * @param string|null $query             Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be inserted
     * @param bool|null   $allowUserChats    Optional. True, if private chats with users can be chosen
     * @param bool|null   $allowBotChats     Optional. True, if private chats with bots can be chosen
     * @param bool|null   $allowGroupChats   Optional. True, if group and supergroup chats can be chosen
     * @param bool|null   $allowChannelChats Optional. True, if channel chats can be chosen
     */
    public function __construct(
        public ?string $query = null,
        public ?bool $allowUserChats = null,
        public ?bool $allowBotChats = null,
        public ?bool $allowGroupChats = null,
        public ?bool $allowChannelChats = null,
    ) {
    }
}
