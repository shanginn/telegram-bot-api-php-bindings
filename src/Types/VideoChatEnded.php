<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a video chat ended in the chat.
 */
class VideoChatEnded implements TypeInterface
{
    /**
     * @param int $duration Video chat duration in seconds
     */
    public function __construct(
        public int $duration,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'duration',
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
            duration: $result['duration'],
        );
    }
}
