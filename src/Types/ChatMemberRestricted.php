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
     * @param bool   $canSendMessages       True, if the user is allowed to send text messages, contacts, invoices, locations and venues
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

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'status',
            'user',
            'is_member',
            'can_send_messages',
            'can_send_audios',
            'can_send_documents',
            'can_send_photos',
            'can_send_videos',
            'can_send_video_notes',
            'can_send_voice_notes',
            'can_send_polls',
            'can_send_other_messages',
            'can_add_web_page_previews',
            'can_change_info',
            'can_invite_users',
            'can_pin_messages',
            'can_manage_topics',
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
            isMember: $result['is_member'],
            canSendMessages: $result['can_send_messages'],
            canSendAudios: $result['can_send_audios'],
            canSendDocuments: $result['can_send_documents'],
            canSendPhotos: $result['can_send_photos'],
            canSendVideos: $result['can_send_videos'],
            canSendVideoNotes: $result['can_send_video_notes'],
            canSendVoiceNotes: $result['can_send_voice_notes'],
            canSendPolls: $result['can_send_polls'],
            canSendOtherMessages: $result['can_send_other_messages'],
            canAddWebPagePreviews: $result['can_add_web_page_previews'],
            canChangeInfo: $result['can_change_info'],
            canInviteUsers: $result['can_invite_users'],
            canPinMessages: $result['can_pin_messages'],
            canManageTopics: $result['can_manage_topics'],
            untilDate: $result['until_date'],
        );
    }
}
