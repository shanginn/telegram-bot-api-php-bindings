<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
 */
class PassportElementErrorUnspecified extends PassportElementError
{
    /**
     * @param string $type        Type of element of the user's Telegram Passport which has the issue
     * @param string $elementHash Base64-encoded element hash
     * @param string $message     Error message
     * @param string $source      Error source, must be unspecified
     */
    public function __construct(
        public string $type,
        public string $elementHash,
        public string $message,
        public string $source = 'unspecified',
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'type',
            'element_hash',
            'message',
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
            type: $result['type'],
            elementHash: $result['element_hash'],
            message: $result['message'],
            source: $result['source'] ?? 'unspecified',
        );
    }
}
