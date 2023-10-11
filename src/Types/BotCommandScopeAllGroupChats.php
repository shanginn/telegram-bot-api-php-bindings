<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the scope of bot commands, covering all group and supergroup chats.
 */
class BotCommandScopeAllGroupChats extends BotCommandScope
{
    /**
     * @param string $type Scope type, must be all_group_chats
     */
    public function __construct(
        public string $type = 'all_group_chats',
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
            type: $result['type'] ?? 'all_group_chats',
        );
    }
}
