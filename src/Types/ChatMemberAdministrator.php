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
     * @param bool        $canManageChat       True, if the administrator can access the chat event log, get boost list, see hidden supergroup and channel members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
     * @param bool        $canDeleteMessages   True, if the administrator can delete messages of other users
     * @param bool        $canManageVideoChats True, if the administrator can manage video chats
     * @param bool        $canRestrictMembers  True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     * @param bool        $canPromoteMembers   True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
     * @param bool        $canChangeInfo       True, if the user is allowed to change the chat title, photo and other settings
     * @param bool        $canInviteUsers      True, if the user is allowed to invite new users to the chat
     * @param bool        $canPostStories      True, if the administrator can post stories to the chat
     * @param bool        $canEditStories      True, if the administrator can edit stories posted by other users, post stories to the chat page, pin chat stories, and access the chat's story archive
     * @param bool        $canDeleteStories    True, if the administrator can delete stories posted by other users
     * @param bool|null   $canPostMessages     Optional. True, if the administrator can post messages in the channel, or access channel statistics; for channels only
     * @param bool|null   $canEditMessages     Optional. True, if the administrator can edit messages of other users and can pin messages; for channels only
     * @param bool|null   $canPinMessages      Optional. True, if the user is allowed to pin messages; for groups and supergroups only
     * @param bool|null   $canManageTopics     Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
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
        public bool $canPostStories,
        public bool $canEditStories,
        public bool $canDeleteStories,
        public ?bool $canPostMessages = null,
        public ?bool $canEditMessages = null,
        public ?bool $canPinMessages = null,
        public ?bool $canManageTopics = null,
        public ?string $customTitle = null,
    ) {
    }
}
