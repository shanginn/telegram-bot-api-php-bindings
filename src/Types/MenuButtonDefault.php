<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes that no specific value for the menu button was set.
 */
class MenuButtonDefault extends MenuButton
{
    /**
     * @param string $type Type of the button, must be default
     */
    public function __construct(
        public string $type = 'default',
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
            type: $result['type'] ?? 'default',
        );
    }
}
