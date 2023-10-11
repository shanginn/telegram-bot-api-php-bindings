<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents the bot's name.
 */
class BotName implements TypeInterface
{
    /**
     * @param string $name The bot's name
     */
    public function __construct(
        public string $name,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'name',
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
            name: $result['name'],
        );
    }
}
