<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 */
class BotCommandScopeChatMember extends BotCommandScope
{
    /**
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int        $userId Unique identifier of the target user
     * @param string     $type   Scope type, must be chat_member
     */
    public function __construct(
        public int|string $chatId,
        public int $userId,
        public string $type = 'chat_member',
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'chat_id',
            'user_id',
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
            chatId: \int | string::fromResponseResult($result['chat_id']),
            userId: $result['user_id'],
            type: $result['type'] ?? 'chat_member',
        );
    }
}
