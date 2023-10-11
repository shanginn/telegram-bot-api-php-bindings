<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents the bot's description.
 */
class BotDescription implements TypeInterface
{
    /**
     * @param string $description The bot's description
     */
    public function __construct(
        public string $description,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'description',
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
            description: $result['description'],
        );
    }
}
