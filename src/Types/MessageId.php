<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a unique message identifier.
 */
class MessageId implements TypeInterface
{
    /**
     * @param int $messageId Unique message identifier
     */
    public function __construct(
        public int $messageId,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'message_id',
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
            messageId: $result['message_id'],
        );
    }
}
