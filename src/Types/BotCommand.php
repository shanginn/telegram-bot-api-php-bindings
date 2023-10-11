<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a bot command.
 */
class BotCommand implements TypeInterface
{
    /**
     * @param string $command     Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     * @param string $description description of the command; 1-256 characters
     */
    public function __construct(
        public string $command,
        public string $description,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'command',
            'description',
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
            command: $result['command'],
            description: $result['description'],
        );
    }
}
