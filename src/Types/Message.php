<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a message.
 */
class Message implements TypeInterface
{
    /**
     * @param int                                $messageId                     Unique message identifier inside this chat
     * @param int                                $date                          Date the message was sent in Unix time
     * @param Chat                               $chat                          Conversation the message belongs to
     * @param int|null                           $messageThreadId               Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
     * @param User|null                          $from                          Optional. Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     * @param Chat|null                          $senderChat                    Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the supergroup itself for messages from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group. For backward compatibility, the field from contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     * @param User|null                          $forwardFrom                   Optional. For forwarded messages, sender of the original message
     * @param Chat|null                          $forwardFromChat               Optional. For messages forwarded from channels or from anonymous administrators, information about the original sender chat
     * @param int|null                           $forwardFromMessageId          Optional. For messages forwarded from channels, identifier of the original message in the channel
     * @param string|null                        $forwardSignature              Optional. For forwarded messages that were originally sent in channels or by an anonymous chat administrator, signature of the message sender if present
     * @param string|null                        $forwardSenderName             Optional. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages
     * @param int|null                           $forwardDate                   Optional. For forwarded messages, date the original message was sent in Unix time
     * @param bool|null                          $isTopicMessage                Optional. True, if the message is sent to a forum topic
     * @param bool|null                          $isAutomaticForward            Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
     * @param Message|null                       $replyToMessage                Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @param User|null                          $viaBot                        Optional. Bot through which the message was sent
     * @param int|null                           $editDate                      Optional. Date the message was last edited in Unix time
     * @param bool|null                          $hasProtectedContent           Optional. True, if the message can't be forwarded
     * @param string|null                        $mediaGroupId                  Optional. The unique identifier of a media message group this message belongs to
     * @param string|null                        $authorSignature               Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
     * @param string|null                        $text                          Optional. For text messages, the actual UTF-8 text of the message
     * @param array<MessageEntity>|null          $entities                      Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     * @param Animation|null                     $animation                     Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
     * @param Audio|null                         $audio                         Optional. Message is an audio file, information about the file
     * @param Document|null                      $document                      Optional. Message is a general file, information about the file
     * @param array<PhotoSize>|null              $photo                         Optional. Message is a photo, available sizes of the photo
     * @param Sticker|null                       $sticker                       Optional. Message is a sticker, information about the sticker
     * @param Story|null                         $story                         Optional. Message is a forwarded story
     * @param Video|null                         $video                         Optional. Message is a video, information about the video
     * @param VideoNote|null                     $videoNote                     Optional. Message is a video note, information about the video message
     * @param Voice|null                         $voice                         Optional. Message is a voice message, information about the file
     * @param string|null                        $caption                       Optional. Caption for the animation, audio, document, photo, video or voice
     * @param array<MessageEntity>|null          $captionEntities               Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
     * @param bool|null                          $hasMediaSpoiler               Optional. True, if the message media is covered by a spoiler animation
     * @param Contact|null                       $contact                       Optional. Message is a shared contact, information about the contact
     * @param Dice|null                          $dice                          Optional. Message is a dice with random value
     * @param Game|null                          $game                          Optional. Message is a game, information about the game. More about games »
     * @param Poll|null                          $poll                          Optional. Message is a native poll, information about the poll
     * @param Venue|null                         $venue                         Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
     * @param Location|null                      $location                      Optional. Message is a shared location, information about the location
     * @param array<User>|null                   $newChatMembers                Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
     * @param User|null                          $leftChatMember                Optional. A member was removed from the group, information about them (this member may be the bot itself)
     * @param string|null                        $newChatTitle                  Optional. A chat title was changed to this value
     * @param array<PhotoSize>|null              $newChatPhoto                  Optional. A chat photo was change to this value
     * @param bool|null                          $deleteChatPhoto               Optional. Service message: the chat photo was deleted
     * @param bool|null                          $groupChatCreated              Optional. Service message: the group has been created
     * @param bool|null                          $supergroupChatCreated         Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     * @param bool|null                          $channelChatCreated            Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
     * @param MessageAutoDeleteTimerChanged|null $messageAutoDeleteTimerChanged Optional. Service message: auto-delete timer settings changed in the chat
     * @param int|null                           $migrateToChatId               Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param int|null                           $migrateFromChatId             Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param Message|null                       $pinnedMessage                 Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
     * @param Invoice|null                       $invoice                       Optional. Message is an invoice for a payment, information about the invoice. More about payments »
     * @param SuccessfulPayment|null             $successfulPayment             Optional. Message is a service message about a successful payment, information about the payment. More about payments »
     * @param UserShared|null                    $userShared                    Optional. Service message: a user was shared with the bot
     * @param ChatShared|null                    $chatShared                    Optional. Service message: a chat was shared with the bot
     * @param string|null                        $connectedWebsite              Optional. The domain name of the website on which the user has logged in. More about Telegram Login »
     * @param WriteAccessAllowed|null            $writeAccessAllowed            Optional. Service message: the user allowed the bot to write messages after adding it to the attachment or side menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess
     * @param PassportData|null                  $passportData                  Optional. Telegram Passport data
     * @param ProximityAlertTriggered|null       $proximityAlertTriggered       Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
     * @param ForumTopicCreated|null             $forumTopicCreated             Optional. Service message: forum topic created
     * @param ForumTopicEdited|null              $forumTopicEdited              Optional. Service message: forum topic edited
     * @param ForumTopicClosed|null              $forumTopicClosed              Optional. Service message: forum topic closed
     * @param ForumTopicReopened|null            $forumTopicReopened            Optional. Service message: forum topic reopened
     * @param GeneralForumTopicHidden|null       $generalForumTopicHidden       Optional. Service message: the 'General' forum topic hidden
     * @param GeneralForumTopicUnhidden|null     $generalForumTopicUnhidden     Optional. Service message: the 'General' forum topic unhidden
     * @param VideoChatScheduled|null            $videoChatScheduled            Optional. Service message: video chat scheduled
     * @param VideoChatStarted|null              $videoChatStarted              Optional. Service message: video chat started
     * @param VideoChatEnded|null                $videoChatEnded                Optional. Service message: video chat ended
     * @param VideoChatParticipantsInvited|null  $videoChatParticipantsInvited  Optional. Service message: new participants invited to a video chat
     * @param WebAppData|null                    $webAppData                    Optional. Service message: data sent by a Web App
     * @param InlineKeyboardMarkup|null          $replyMarkup                   Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     */
    public function __construct(
        public int $messageId,
        public int $date,
        public Chat $chat,
        public ?int $messageThreadId = null,
        public ?User $from = null,
        public ?Chat $senderChat = null,
        public ?User $forwardFrom = null,
        public ?Chat $forwardFromChat = null,
        public ?int $forwardFromMessageId = null,
        public ?string $forwardSignature = null,
        public ?string $forwardSenderName = null,
        public ?int $forwardDate = null,
        public ?bool $isTopicMessage = true,
        public ?bool $isAutomaticForward = true,
        public ?Message $replyToMessage = null,
        public ?User $viaBot = null,
        public ?int $editDate = null,
        public ?bool $hasProtectedContent = true,
        public ?string $mediaGroupId = null,
        public ?string $authorSignature = null,
        public ?string $text = null,
        public ?array $entities = null,
        public ?Animation $animation = null,
        public ?Audio $audio = null,
        public ?Document $document = null,
        public ?array $photo = null,
        public ?Sticker $sticker = null,
        public ?Story $story = null,
        public ?Video $video = null,
        public ?VideoNote $videoNote = null,
        public ?Voice $voice = null,
        public ?string $caption = null,
        public ?array $captionEntities = null,
        public ?bool $hasMediaSpoiler = true,
        public ?Contact $contact = null,
        public ?Dice $dice = null,
        public ?Game $game = null,
        public ?Poll $poll = null,
        public ?Venue $venue = null,
        public ?Location $location = null,
        public ?array $newChatMembers = null,
        public ?User $leftChatMember = null,
        public ?string $newChatTitle = null,
        public ?array $newChatPhoto = null,
        public ?bool $deleteChatPhoto = true,
        public ?bool $groupChatCreated = true,
        public ?bool $supergroupChatCreated = true,
        public ?bool $channelChatCreated = true,
        public ?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged = null,
        public ?int $migrateToChatId = null,
        public ?int $migrateFromChatId = null,
        public ?Message $pinnedMessage = null,
        public ?Invoice $invoice = null,
        public ?SuccessfulPayment $successfulPayment = null,
        public ?UserShared $userShared = null,
        public ?ChatShared $chatShared = null,
        public ?string $connectedWebsite = null,
        public ?WriteAccessAllowed $writeAccessAllowed = null,
        public ?PassportData $passportData = null,
        public ?ProximityAlertTriggered $proximityAlertTriggered = null,
        public ?ForumTopicCreated $forumTopicCreated = null,
        public ?ForumTopicEdited $forumTopicEdited = null,
        public ?ForumTopicClosed $forumTopicClosed = null,
        public ?ForumTopicReopened $forumTopicReopened = null,
        public ?GeneralForumTopicHidden $generalForumTopicHidden = null,
        public ?GeneralForumTopicUnhidden $generalForumTopicUnhidden = null,
        public ?VideoChatScheduled $videoChatScheduled = null,
        public ?VideoChatStarted $videoChatStarted = null,
        public ?VideoChatEnded $videoChatEnded = null,
        public ?VideoChatParticipantsInvited $videoChatParticipantsInvited = null,
        public ?WebAppData $webAppData = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'message_id',
            'date',
            'chat',
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
            messageId: $result['message_id'],
            date: $result['date'],
            chat: \Shanginn\TelegramBotApiBindings\Types\Chat::fromResponseResult($result['chat']),
            messageThreadId: $result['message_thread_id'] ?? null,
            from: ($result['from'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['from'])
                : null,
            senderChat: ($result['sender_chat'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Chat::fromResponseResult($result['sender_chat'])
                : null,
            forwardFrom: ($result['forward_from'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['forward_from'])
                : null,
            forwardFromChat: ($result['forward_from_chat'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Chat::fromResponseResult($result['forward_from_chat'])
                : null,
            forwardFromMessageId: $result['forward_from_message_id'] ?? null,
            forwardSignature: $result['forward_signature'] ?? null,
            forwardSenderName: $result['forward_sender_name'] ?? null,
            forwardDate: $result['forward_date'] ?? null,
            isTopicMessage: $result['is_topic_message'] ?? true,
            isAutomaticForward: $result['is_automatic_forward'] ?? true,
            replyToMessage: ($result['reply_to_message'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Message::fromResponseResult($result['reply_to_message'])
                : null,
            viaBot: ($result['via_bot'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['via_bot'])
                : null,
            editDate: $result['edit_date'] ?? null,
            hasProtectedContent: $result['has_protected_content'] ?? true,
            mediaGroupId: $result['media_group_id'] ?? null,
            authorSignature: $result['author_signature'] ?? null,
            text: $result['text'] ?? null,
            entities: $result['entities'] ?? null,
            animation: ($result['animation'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Animation::fromResponseResult($result['animation'])
                : null,
            audio: ($result['audio'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Audio::fromResponseResult($result['audio'])
                : null,
            document: ($result['document'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Document::fromResponseResult($result['document'])
                : null,
            photo: $result['photo'] ?? null,
            sticker: ($result['sticker'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Sticker::fromResponseResult($result['sticker'])
                : null,
            story: ($result['story'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Story::fromResponseResult($result['story'])
                : null,
            video: ($result['video'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Video::fromResponseResult($result['video'])
                : null,
            videoNote: ($result['video_note'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\VideoNote::fromResponseResult($result['video_note'])
                : null,
            voice: ($result['voice'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Voice::fromResponseResult($result['voice'])
                : null,
            caption: $result['caption'] ?? null,
            captionEntities: $result['caption_entities'] ?? null,
            hasMediaSpoiler: $result['has_media_spoiler'] ?? true,
            contact: ($result['contact'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Contact::fromResponseResult($result['contact'])
                : null,
            dice: ($result['dice'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Dice::fromResponseResult($result['dice'])
                : null,
            game: ($result['game'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Game::fromResponseResult($result['game'])
                : null,
            poll: ($result['poll'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Poll::fromResponseResult($result['poll'])
                : null,
            venue: ($result['venue'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Venue::fromResponseResult($result['venue'])
                : null,
            location: ($result['location'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Location::fromResponseResult($result['location'])
                : null,
            newChatMembers: $result['new_chat_members'] ?? null,
            leftChatMember: ($result['left_chat_member'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['left_chat_member'])
                : null,
            newChatTitle: $result['new_chat_title'] ?? null,
            newChatPhoto: $result['new_chat_photo'] ?? null,
            deleteChatPhoto: $result['delete_chat_photo'] ?? true,
            groupChatCreated: $result['group_chat_created'] ?? true,
            supergroupChatCreated: $result['supergroup_chat_created'] ?? true,
            channelChatCreated: $result['channel_chat_created'] ?? true,
            messageAutoDeleteTimerChanged: ($result['message_auto_delete_timer_changed'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\MessageAutoDeleteTimerChanged::fromResponseResult($result['message_auto_delete_timer_changed'])
                : null,
            migrateToChatId: $result['migrate_to_chat_id'] ?? null,
            migrateFromChatId: $result['migrate_from_chat_id'] ?? null,
            pinnedMessage: ($result['pinned_message'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Message::fromResponseResult($result['pinned_message'])
                : null,
            invoice: ($result['invoice'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Invoice::fromResponseResult($result['invoice'])
                : null,
            successfulPayment: ($result['successful_payment'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\SuccessfulPayment::fromResponseResult($result['successful_payment'])
                : null,
            userShared: ($result['user_shared'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\UserShared::fromResponseResult($result['user_shared'])
                : null,
            chatShared: ($result['chat_shared'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ChatShared::fromResponseResult($result['chat_shared'])
                : null,
            connectedWebsite: $result['connected_website'] ?? null,
            writeAccessAllowed: ($result['write_access_allowed'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\WriteAccessAllowed::fromResponseResult($result['write_access_allowed'])
                : null,
            passportData: ($result['passport_data'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\PassportData::fromResponseResult($result['passport_data'])
                : null,
            proximityAlertTriggered: ($result['proximity_alert_triggered'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ProximityAlertTriggered::fromResponseResult($result['proximity_alert_triggered'])
                : null,
            forumTopicCreated: ($result['forum_topic_created'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ForumTopicCreated::fromResponseResult($result['forum_topic_created'])
                : null,
            forumTopicEdited: ($result['forum_topic_edited'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ForumTopicEdited::fromResponseResult($result['forum_topic_edited'])
                : null,
            forumTopicClosed: ($result['forum_topic_closed'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ForumTopicClosed::fromResponseResult($result['forum_topic_closed'])
                : null,
            forumTopicReopened: ($result['forum_topic_reopened'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ForumTopicReopened::fromResponseResult($result['forum_topic_reopened'])
                : null,
            generalForumTopicHidden: ($result['general_forum_topic_hidden'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\GeneralForumTopicHidden::fromResponseResult($result['general_forum_topic_hidden'])
                : null,
            generalForumTopicUnhidden: ($result['general_forum_topic_unhidden'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\GeneralForumTopicUnhidden::fromResponseResult($result['general_forum_topic_unhidden'])
                : null,
            videoChatScheduled: ($result['video_chat_scheduled'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\VideoChatScheduled::fromResponseResult($result['video_chat_scheduled'])
                : null,
            videoChatStarted: ($result['video_chat_started'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\VideoChatStarted::fromResponseResult($result['video_chat_started'])
                : null,
            videoChatEnded: ($result['video_chat_ended'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\VideoChatEnded::fromResponseResult($result['video_chat_ended'])
                : null,
            videoChatParticipantsInvited: ($result['video_chat_participants_invited'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\VideoChatParticipantsInvited::fromResponseResult($result['video_chat_participants_invited'])
                : null,
            webAppData: ($result['web_app_data'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\WebAppData::fromResponseResult($result['web_app_data'])
                : null,
            replyMarkup: ($result['reply_markup'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup::fromResponseResult($result['reply_markup'])
                : null,
        );
    }
}
