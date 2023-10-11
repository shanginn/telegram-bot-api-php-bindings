<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 */
class KeyboardButtonPollType implements TypeInterface
{
    /**
     * @param string|null $type Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode. If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
     */
    public function __construct(
        public ?string $type = null,
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
            type: $result['type'] ?? null,
        );
    }
}
