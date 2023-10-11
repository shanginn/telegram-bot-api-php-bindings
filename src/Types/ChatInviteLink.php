<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an invite link for a chat.
 */
class ChatInviteLink implements TypeInterface
{
    /**
     * @param string      $inviteLink              The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”.
     * @param User        $creator                 Creator of the link
     * @param bool        $createsJoinRequest      True, if users joining the chat via the link need to be approved by chat administrators
     * @param bool        $isPrimary               True, if the link is primary
     * @param bool        $isRevoked               True, if the link is revoked
     * @param string|null $name                    Optional. Invite link name
     * @param int|null    $expireDate              Optional. Point in time (Unix timestamp) when the link will expire or has been expired
     * @param int|null    $memberLimit             Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
     * @param int|null    $pendingJoinRequestCount Optional. Number of pending join requests created using this link
     */
    public function __construct(
        public string $inviteLink,
        public User $creator,
        public bool $createsJoinRequest,
        public bool $isPrimary,
        public bool $isRevoked,
        public ?string $name = null,
        public ?int $expireDate = null,
        public ?int $memberLimit = null,
        public ?int $pendingJoinRequestCount = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'invite_link',
            'creator',
            'creates_join_request',
            'is_primary',
            'is_revoked',
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
            inviteLink: $result['invite_link'],
            creator: \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['creator']),
            createsJoinRequest: $result['creates_join_request'],
            isPrimary: $result['is_primary'],
            isRevoked: $result['is_revoked'],
            name: $result['name'] ?? null,
            expireDate: $result['expire_date'] ?? null,
            memberLimit: $result['member_limit'] ?? null,
            pendingJoinRequestCount: $result['pending_join_request_count'] ?? null,
        );
    }
}
