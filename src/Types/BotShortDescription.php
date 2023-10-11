<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents the bot's short description.
 */
class BotShortDescription implements TypeInterface
{
    /**
     * @param string $shortDescription The bot's short description
     */
    public function __construct(
        public string $shortDescription,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'short_description',
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
            shortDescription: $result['short_description'],
        );
    }
}
