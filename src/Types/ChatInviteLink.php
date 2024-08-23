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
     * @param int|null    $subscriptionPeriod      Optional. The number of seconds the subscription will be active for before the next payment
     * @param int|null    $subscriptionPrice       Optional. The amount of Telegram Stars a user must pay initially and after each subsequent subscription period to be a member of the chat using the link
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
        public ?int $subscriptionPeriod = null,
        public ?int $subscriptionPrice = null,
    ) {
    }
}
