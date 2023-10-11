<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a chat member that was banned in the chat and can't return to the chat or view chat messages.
 */
class ChatMemberBanned extends ChatMember
{
    /**
     * @param string $status    The member's status in the chat, always “kicked”
     * @param User   $user      Information about the user
     * @param int    $untilDate Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned forever
     */
    public function __construct(
        public string $status,
        public User $user,
        public int $untilDate,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'status',
            'user',
            'until_date',
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
            untilDate: $result['until_date'],
        );
    }
}
