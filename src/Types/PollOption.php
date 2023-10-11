<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about one answer option in a poll.
 */
class PollOption implements TypeInterface
{
    /**
     * @param string $text       Option text, 1-100 characters
     * @param int    $voterCount Number of users that voted for this option
     */
    public function __construct(
        public string $text,
        public int $voterCount,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'text',
            'voter_count',
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
            text: $result['text'],
            voterCount: $result['voter_count'],
        );
    }
}
