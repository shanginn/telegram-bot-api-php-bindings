<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a menu button, which opens the bot's list of commands.
 */
class MenuButtonCommands extends MenuButton
{
    /**
     * @param string $type Type of the button, must be commands
     */
    public function __construct(
        public string $type = 'commands',
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
            type: $result['type'] ?? 'commands',
        );
    }
}
