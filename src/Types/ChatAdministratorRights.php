<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the rights of an administrator in a chat.
 */
class ChatAdministratorRights implements TypeInterface
{
    /**
     * @param bool      $isAnonymous         True, if the user's presence in the chat is hidden
     * @param bool      $canManageChat       True, if the administrator can access the chat event log, boost list in channels, see channel members, report spam messages, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege
     * @param bool      $canDeleteMessages   True, if the administrator can delete messages of other users
     * @param bool      $canManageVideoChats True, if the administrator can manage video chats
     * @param bool      $canRestrictMembers  True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     * @param bool      $canPromoteMembers   True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
     * @param bool      $canChangeInfo       True, if the user is allowed to change the chat title, photo and other settings
     * @param bool      $canInviteUsers      True, if the user is allowed to invite new users to the chat
     * @param bool|null $canPostMessages     Optional. True, if the administrator can post messages in the channel, or access channel statistics; channels only
     * @param bool|null $canEditMessages     Optional. True, if the administrator can edit messages of other users and can pin messages; channels only
     * @param bool|null $canPinMessages      Optional. True, if the user is allowed to pin messages; groups and supergroups only
     * @param bool|null $canPostStories      Optional. True, if the administrator can post stories in the channel; channels only
     * @param bool|null $canEditStories      Optional. True, if the administrator can edit stories posted by other users; channels only
     * @param bool|null $canDeleteStories    Optional. True, if the administrator can delete stories posted by other users; channels only
     * @param bool|null $canManageTopics     Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
     */
    public function __construct(
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
    ) {
    }
}
