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

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($result[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            query: $result['query'] ?? null,
            allowUserChats: $result['allow_user_chats'] ?? null,
            allowBotChats: $result['allow_bot_chats'] ?? null,
            allowGroupChats: $result['allow_group_chats'] ?? null,
            allowChannelChats: $result['allow_channel_chats'] ?? null,
        );
    }
}
