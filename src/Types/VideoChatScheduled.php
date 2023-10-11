<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 */
class VideoChatScheduled implements TypeInterface
{
    /**
     * @param int $startDate Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
     */
    public function __construct(
        public int $startDate,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'start_date',
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
            startDate: $result['start_date'],
        );
    }
}
