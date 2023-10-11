<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about new members invited to a video chat.
 */
class VideoChatParticipantsInvited implements TypeInterface
{
    /**
     * @param array<User> $users New members that were invited to the video chat
     */
    public function __construct(
        public array $users,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'users',
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
            users: $result['users'],
        );
    }
}
