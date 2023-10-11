<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a join request sent to a chat.
 */
class ChatJoinRequest implements TypeInterface
{
    /**
     * @param Chat                $chat       Chat to which the request was sent
     * @param User                $from       User that sent the join request
     * @param int                 $userChatId Identifier of a private chat with the user who sent the join request. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot can use this identifier for 5 minutes to send messages until the join request is processed, assuming no other administrator contacted the user.
     * @param int                 $date       Date the request was sent in Unix time
     * @param string|null         $bio        Optional. Bio of the user.
     * @param ChatInviteLink|null $inviteLink Optional. Chat invite link that was used by the user to send the join request
     */
    public function __construct(
        public Chat $chat,
        public User $from,
        public int $userChatId,
        public int $date,
        public ?string $bio = null,
        public ?ChatInviteLink $inviteLink = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'chat',
            'from',
            'user_chat_id',
            'date',
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
            chat: \Shanginn\TelegramBotApiBindings\Types\Chat::fromResponseResult($result['chat']),
            from: \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['from']),
            userChatId: $result['user_chat_id'],
            date: $result['date'],
            bio: $result['bio'] ?? null,
            inviteLink: ($result['invite_link'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ChatInviteLink::fromResponseResult($result['invite_link'])
                : null,
        );
    }
}
