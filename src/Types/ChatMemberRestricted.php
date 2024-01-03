<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a chat member that is under certain restrictions in the chat. Supergroups only.
 */
class ChatMemberRestricted extends ChatMember
{
    /**
     * @param string $status                The member's status in the chat, always “restricted”
     * @param User   $user                  Information about the user
     * @param bool   $isMember              True, if the user is a member of the chat at the moment of the request
     * @param bool   $canSendMessages       True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices, locations and venues
     * @param bool   $canSendAudios         True, if the user is allowed to send audios
     * @param bool   $canSendDocuments      True, if the user is allowed to send documents
     * @param bool   $canSendPhotos         True, if the user is allowed to send photos
     * @param bool   $canSendVideos         True, if the user is allowed to send videos
     * @param bool   $canSendVideoNotes     True, if the user is allowed to send video notes
     * @param bool   $canSendVoiceNotes     True, if the user is allowed to send voice notes
     * @param bool   $canSendPolls          True, if the user is allowed to send polls
     * @param bool   $canSendOtherMessages  True, if the user is allowed to send animations, games, stickers and use inline bots
     * @param bool   $canAddWebPagePreviews True, if the user is allowed to add web page previews to their messages
     * @param bool   $canChangeInfo         True, if the user is allowed to change the chat title, photo and other settings
     * @param bool   $canInviteUsers        True, if the user is allowed to invite new users to the chat
     * @param bool   $canPinMessages        True, if the user is allowed to pin messages
     * @param bool   $canManageTopics       True, if the user is allowed to create forum topics
     * @param int    $untilDate             Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted forever
     */
    public function __construct(
        public string $status,
        public User $user,
        public bool $isMember,
        public bool $canSendMessages,
        public bool $canSendAudios,
        public bool $canSendDocuments,
        public bool $canSendPhotos,
        public bool $canSendVideos,
        public bool $canSendVideoNotes,
        public bool $canSendVoiceNotes,
        public bool $canSendPolls,
        public bool $canSendOtherMessages,
        public bool $canAddWebPagePreviews,
        public bool $canChangeInfo,
        public bool $canInviteUsers,
        public bool $canPinMessages,
        public bool $canManageTopics,
        public int $untilDate,
    ) {
    }
}
