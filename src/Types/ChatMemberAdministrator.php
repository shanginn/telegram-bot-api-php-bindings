<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a chat member that has some additional privileges.
 */
class ChatMemberAdministrator extends ChatMember
{
    /**
     * @param string      $status              The member's status in the chat, always “administrator”
     * @param User        $user                Information about the user
     * @param bool        $canBeEdited         True, if the bot is allowed to edit administrator privileges of that user
     * @param bool        $isAnonymous         True, if the user's presence in the chat is hidden
     * @param bool        $canManageChat       True, if the administrator can access the chat event log, boost list in channels, see channel members, report spam messages, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
     * @param bool        $canDeleteMessages   True, if the administrator can delete messages of other users
     * @param bool        $canManageVideoChats True, if the administrator can manage video chats
     * @param bool        $canRestrictMembers  True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     * @param bool        $canPromoteMembers   True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
     * @param bool        $canChangeInfo       True, if the user is allowed to change the chat title, photo and other settings
     * @param bool        $canInviteUsers      True, if the user is allowed to invite new users to the chat
     * @param bool|null   $canPostMessages     Optional. True, if the administrator can post messages in the channel, or access channel statistics; channels only
     * @param bool|null   $canEditMessages     Optional. True, if the administrator can edit messages of other users and can pin messages; channels only
     * @param bool|null   $canPinMessages      Optional. True, if the user is allowed to pin messages; groups and supergroups only
     * @param bool|null   $canPostStories      Optional. True, if the administrator can post stories in the channel; channels only
     * @param bool|null   $canEditStories      Optional. True, if the administrator can edit stories posted by other users; channels only
     * @param bool|null   $canDeleteStories    Optional. True, if the administrator can delete stories posted by other users; channels only
     * @param bool|null   $canManageTopics     Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
     * @param string|null $customTitle         Optional. Custom title for this user
     */
    public function __construct(
        public string $status,
        public User $user,
        public bool $canBeEdited,
        public bool $isAnonymous,
        public bool $canManageChat,
        public bool $canDeleteMessages,
        public bool $canManageVideoChats,
        public bool $canRestrictMembers,
        public bool $canPromoteMembers,
        public bool $canChangeInfo,
        public bool $canInviteUsers,
        public ?bool $canPostMessages = null,
        public ?bool $canEditMessages = null,
        public ?bool $canPinMessages = null,
        public ?bool $canPostStories = null,
        public ?bool $canEditStories = null,
        public ?bool $canDeleteStories = null,
        public ?bool $canManageTopics = null,
        public ?string $customTitle = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'status',
            'user',
            'can_be_edited',
            'is_anonymous',
            'can_manage_chat',
            'can_delete_messages',
            'can_manage_video_chats',
            'can_restrict_members',
            'can_promote_members',
            'can_change_info',
            'can_invite_users',
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
            status: $result['status'],
            user: \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['user']),
            canBeEdited: $result['can_be_edited'],
            isAnonymous: $result['is_anonymous'],
            canManageChat: $result['can_manage_chat'],
            canDeleteMessages: $result['can_delete_messages'],
            canManageVideoChats: $result['can_manage_video_chats'],
            canRestrictMembers: $result['can_restrict_members'],
            canPromoteMembers: $result['can_promote_members'],
            canChangeInfo: $result['can_change_info'],
            canInviteUsers: $result['can_invite_users'],
            canPostMessages: $result['can_post_messages'] ?? null,
            canEditMessages: $result['can_edit_messages'] ?? null,
            canPinMessages: $result['can_pin_messages'] ?? null,
            canPostStories: $result['can_post_stories'] ?? null,
            canEditStories: $result['can_edit_stories'] ?? null,
            canDeleteStories: $result['can_delete_stories'] ?? null,
            canManageTopics: $result['can_manage_topics'] ?? null,
            customTitle: $result['custom_title'] ?? null,
        );
    }
}
