<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 */
class ProximityAlertTriggered implements TypeInterface
{
    /**
     * @param User $traveler User that triggered the alert
     * @param User $watcher  User that set the alert
     * @param int  $distance The distance between the users
     */
    public function __construct(
        public User $traveler,
        public User $watcher,
        public int $distance,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'traveler',
            'watcher',
            'distance',
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
            traveler: \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['traveler']),
            watcher: \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['watcher']),
            distance: $result['distance'],
        );
    }
}
