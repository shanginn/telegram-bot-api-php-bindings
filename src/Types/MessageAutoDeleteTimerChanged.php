<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a change in auto-delete timer settings.
 */
class MessageAutoDeleteTimerChanged implements TypeInterface
{
    /**
     * @param int $messageAutoDeleteTime New auto-delete time for messages in the chat; in seconds
     */
    public function __construct(
        public int $messageAutoDeleteTime,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'message_auto_delete_time',
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
            messageAutoDeleteTime: $result['message_auto_delete_time'],
        );
    }
}
