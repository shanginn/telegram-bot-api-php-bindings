<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a chat member that owns the chat and has all administrator privileges.
 */
class ChatMemberOwner extends ChatMember
{
    /**
     * @param string      $status      The member's status in the chat, always “creator”
     * @param User        $user        Information about the user
     * @param bool        $isAnonymous True, if the user's presence in the chat is hidden
     * @param string|null $customTitle Optional. Custom title for this user
     */
    public function __construct(
        public string $status,
        public User $user,
        public bool $isAnonymous,
        public ?string $customTitle = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'status',
            'user',
            'is_anonymous',
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
            isAnonymous: $result['is_anonymous'],
            customTitle: $result['custom_title'] ?? null,
        );
    }
}
