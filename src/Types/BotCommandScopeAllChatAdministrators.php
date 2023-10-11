<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 */
class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
    /**
     * @param string $type Scope type, must be all_chat_administrators
     */
    public function __construct(
        public string $type = 'all_chat_administrators',
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
            type: $result['type'] ?? 'all_chat_administrators',
        );
    }
}
