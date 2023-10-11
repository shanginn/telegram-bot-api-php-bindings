<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes actions that a non-administrator user is allowed to take in a chat.
 */
class ChatPermissions implements TypeInterface
{
    /**
     * @param bool|null $canSendMessages       Optional. True, if the user is allowed to send text messages, contacts, invoices, locations and venues
     * @param bool|null $canSendAudios         Optional. True, if the user is allowed to send audios
     * @param bool|null $canSendDocuments      Optional. True, if the user is allowed to send documents
     * @param bool|null $canSendPhotos         Optional. True, if the user is allowed to send photos
     * @param bool|null $canSendVideos         Optional. True, if the user is allowed to send videos
     * @param bool|null $canSendVideoNotes     Optional. True, if the user is allowed to send video notes
     * @param bool|null $canSendVoiceNotes     Optional. True, if the user is allowed to send voice notes
     * @param bool|null $canSendPolls          Optional. True, if the user is allowed to send polls
     * @param bool|null $canSendOtherMessages  Optional. True, if the user is allowed to send animations, games, stickers and use inline bots
     * @param bool|null $canAddWebPagePreviews Optional. True, if the user is allowed to add web page previews to their messages
     * @param bool|null $canChangeInfo         Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
     * @param bool|null $canInviteUsers        Optional. True, if the user is allowed to invite new users to the chat
     * @param bool|null $canPinMessages        Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
     * @param bool|null $canManageTopics       Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
     */
    public function __construct(
        public ?bool $canSendMessages = null,
        public ?bool $canSendAudios = null,
        public ?bool $canSendDocuments = null,
        public ?bool $canSendPhotos = null,
        public ?bool $canSendVideos = null,
        public ?bool $canSendVideoNotes = null,
        public ?bool $canSendVoiceNotes = null,
        public ?bool $canSendPolls = null,
        public ?bool $canSendOtherMessages = null,
        public ?bool $canAddWebPagePreviews = null,
        public ?bool $canChangeInfo = null,
        public ?bool $canInviteUsers = null,
        public ?bool $canPinMessages = null,
        public ?bool $canManageTopics = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
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
            canSendMessages: $result['can_send_messages'] ?? null,
            canSendAudios: $result['can_send_audios'] ?? null,
            canSendDocuments: $result['can_send_documents'] ?? null,
            canSendPhotos: $result['can_send_photos'] ?? null,
            canSendVideos: $result['can_send_videos'] ?? null,
            canSendVideoNotes: $result['can_send_video_notes'] ?? null,
            canSendVoiceNotes: $result['can_send_voice_notes'] ?? null,
            canSendPolls: $result['can_send_polls'] ?? null,
            canSendOtherMessages: $result['can_send_other_messages'] ?? null,
            canAddWebPagePreviews: $result['can_add_web_page_previews'] ?? null,
            canChangeInfo: $result['can_change_info'] ?? null,
            canInviteUsers: $result['can_invite_users'] ?? null,
            canPinMessages: $result['can_pin_messages'] ?? null,
            canManageTopics: $result['can_manage_topics'] ?? null,
        );
    }
}
