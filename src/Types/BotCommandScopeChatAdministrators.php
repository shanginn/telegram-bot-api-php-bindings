<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the scope of bot commands, covering all administrators of a specific group or supergroup chat.
 */
class BotCommandScopeChatAdministrators extends BotCommandScope
{
    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string     $type   Scope type, must be chat_administrators
     */
    public function __construct(
        public int|string $chatId,
        public string $type = 'chat_administrators',
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'chat_id',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            chatId: \int | string::fromResponseResult($result['chat_id']),
            type: $result['type'] ?? 'chat_administrators',
        );
    }
}
