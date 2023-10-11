<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 */
class ChatMemberLeft extends ChatMember
{
    /**
     * @param string $status The member's status in the chat, always “left”
     * @param User   $user   Information about the user
     */
    public function __construct(
        public string $status,
        public User $user,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'status',
            'user',
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
            status: $result['status'],
            user: \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['user']),
        );
    }
}
