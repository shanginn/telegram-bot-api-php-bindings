<?php

namespace Shanginn\TelegramBotApiBindings;

use Shanginn\TelegramBotApiBindings\Types\Animation;
use Shanginn\TelegramBotApiBindings\Types\Audio;
use Shanginn\TelegramBotApiBindings\Types\BotCommand;
use Shanginn\TelegramBotApiBindings\Types\BotCommandScopeAllChatAdministrators;
use Shanginn\TelegramBotApiBindings\Types\BotCommandScopeAllGroupChats;
use Shanginn\TelegramBotApiBindings\Types\BotCommandScopeAllPrivateChats;
use Shanginn\TelegramBotApiBindings\Types\BotCommandScopeChat;
use Shanginn\TelegramBotApiBindings\Types\BotCommandScopeChatAdministrators;
use Shanginn\TelegramBotApiBindings\Types\BotCommandScopeChatMember;
use Shanginn\TelegramBotApiBindings\Types\BotCommandScopeDefault;
use Shanginn\TelegramBotApiBindings\Types\BotDescription;
use Shanginn\TelegramBotApiBindings\Types\BotName;
use Shanginn\TelegramBotApiBindings\Types\BotShortDescription;
use Shanginn\TelegramBotApiBindings\Types\CallbackGame;
use Shanginn\TelegramBotApiBindings\Types\CallbackQuery;
use Shanginn\TelegramBotApiBindings\Types\Chat;
use Shanginn\TelegramBotApiBindings\Types\ChatAdministratorRights;
use Shanginn\TelegramBotApiBindings\Types\ChatInviteLink;
use Shanginn\TelegramBotApiBindings\Types\ChatJoinRequest;
use Shanginn\TelegramBotApiBindings\Types\ChatLocation;
use Shanginn\TelegramBotApiBindings\Types\ChatMemberAdministrator;
use Shanginn\TelegramBotApiBindings\Types\ChatMemberBanned;
use Shanginn\TelegramBotApiBindings\Types\ChatMemberLeft;
use Shanginn\TelegramBotApiBindings\Types\ChatMemberMember;
use Shanginn\TelegramBotApiBindings\Types\ChatMemberOwner;
use Shanginn\TelegramBotApiBindings\Types\ChatMemberRestricted;
use Shanginn\TelegramBotApiBindings\Types\ChatMemberUpdated;
use Shanginn\TelegramBotApiBindings\Types\ChatPermissions;
use Shanginn\TelegramBotApiBindings\Types\ChatPhoto;
use Shanginn\TelegramBotApiBindings\Types\ChatShared;
use Shanginn\TelegramBotApiBindings\Types\ChosenInlineResult;
use Shanginn\TelegramBotApiBindings\Types\Contact;
use Shanginn\TelegramBotApiBindings\Types\Dice;
use Shanginn\TelegramBotApiBindings\Types\Document;
use Shanginn\TelegramBotApiBindings\Types\EncryptedCredentials;
use Shanginn\TelegramBotApiBindings\Types\EncryptedPassportElement;
use Shanginn\TelegramBotApiBindings\Types\File;
use Shanginn\TelegramBotApiBindings\Types\ForceReply;
use Shanginn\TelegramBotApiBindings\Types\ForumTopic;
use Shanginn\TelegramBotApiBindings\Types\ForumTopicClosed;
use Shanginn\TelegramBotApiBindings\Types\ForumTopicCreated;
use Shanginn\TelegramBotApiBindings\Types\ForumTopicEdited;
use Shanginn\TelegramBotApiBindings\Types\ForumTopicReopened;
use Shanginn\TelegramBotApiBindings\Types\Game;
use Shanginn\TelegramBotApiBindings\Types\GameHighScore;
use Shanginn\TelegramBotApiBindings\Types\GeneralForumTopicHidden;
use Shanginn\TelegramBotApiBindings\Types\GeneralForumTopicUnhidden;
use Shanginn\TelegramBotApiBindings\Types\InlineKeyboardButton;
use Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup;
use Shanginn\TelegramBotApiBindings\Types\InlineQuery;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultArticle;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultAudio;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultCachedAudio;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultCachedDocument;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultCachedGif;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultCachedMpeg4Gif;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultCachedPhoto;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultCachedSticker;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultCachedVideo;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultCachedVoice;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultContact;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultDocument;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultGame;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultGif;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultLocation;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultMpeg4Gif;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultPhoto;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultsButton;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultVenue;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultVideo;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultVoice;
use Shanginn\TelegramBotApiBindings\Types\InputContactMessageContent;
use Shanginn\TelegramBotApiBindings\Types\InputFile;
use Shanginn\TelegramBotApiBindings\Types\InputInvoiceMessageContent;
use Shanginn\TelegramBotApiBindings\Types\InputLocationMessageContent;
use Shanginn\TelegramBotApiBindings\Types\InputMediaAnimation;
use Shanginn\TelegramBotApiBindings\Types\InputMediaAudio;
use Shanginn\TelegramBotApiBindings\Types\InputMediaDocument;
use Shanginn\TelegramBotApiBindings\Types\InputMediaPhoto;
use Shanginn\TelegramBotApiBindings\Types\InputMediaVideo;
use Shanginn\TelegramBotApiBindings\Types\InputSticker;
use Shanginn\TelegramBotApiBindings\Types\InputTextMessageContent;
use Shanginn\TelegramBotApiBindings\Types\InputVenueMessageContent;
use Shanginn\TelegramBotApiBindings\Types\Invoice;
use Shanginn\TelegramBotApiBindings\Types\KeyboardButton;
use Shanginn\TelegramBotApiBindings\Types\KeyboardButtonPollType;
use Shanginn\TelegramBotApiBindings\Types\KeyboardButtonRequestChat;
use Shanginn\TelegramBotApiBindings\Types\KeyboardButtonRequestUser;
use Shanginn\TelegramBotApiBindings\Types\LabeledPrice;
use Shanginn\TelegramBotApiBindings\Types\Location;
use Shanginn\TelegramBotApiBindings\Types\LoginUrl;
use Shanginn\TelegramBotApiBindings\Types\MaskPosition;
use Shanginn\TelegramBotApiBindings\Types\MenuButtonCommands;
use Shanginn\TelegramBotApiBindings\Types\MenuButtonDefault;
use Shanginn\TelegramBotApiBindings\Types\MenuButtonWebApp;
use Shanginn\TelegramBotApiBindings\Types\Message;
use Shanginn\TelegramBotApiBindings\Types\MessageAutoDeleteTimerChanged;
use Shanginn\TelegramBotApiBindings\Types\MessageEntity;
use Shanginn\TelegramBotApiBindings\Types\MessageId;
use Shanginn\TelegramBotApiBindings\Types\OrderInfo;
use Shanginn\TelegramBotApiBindings\Types\PassportData;
use Shanginn\TelegramBotApiBindings\Types\PassportElementErrorDataField;
use Shanginn\TelegramBotApiBindings\Types\PassportElementErrorFile;
use Shanginn\TelegramBotApiBindings\Types\PassportElementErrorFiles;
use Shanginn\TelegramBotApiBindings\Types\PassportElementErrorFrontSide;
use Shanginn\TelegramBotApiBindings\Types\PassportElementErrorReverseSide;
use Shanginn\TelegramBotApiBindings\Types\PassportElementErrorSelfie;
use Shanginn\TelegramBotApiBindings\Types\PassportElementErrorTranslationFile;
use Shanginn\TelegramBotApiBindings\Types\PassportElementErrorTranslationFiles;
use Shanginn\TelegramBotApiBindings\Types\PassportElementErrorUnspecified;
use Shanginn\TelegramBotApiBindings\Types\PassportFile;
use Shanginn\TelegramBotApiBindings\Types\PhotoSize;
use Shanginn\TelegramBotApiBindings\Types\Poll;
use Shanginn\TelegramBotApiBindings\Types\PollAnswer;
use Shanginn\TelegramBotApiBindings\Types\PollOption;
use Shanginn\TelegramBotApiBindings\Types\PreCheckoutQuery;
use Shanginn\TelegramBotApiBindings\Types\ProximityAlertTriggered;
use Shanginn\TelegramBotApiBindings\Types\ReplyKeyboardMarkup;
use Shanginn\TelegramBotApiBindings\Types\ReplyKeyboardRemove;
use Shanginn\TelegramBotApiBindings\Types\ResponseParameters;
use Shanginn\TelegramBotApiBindings\Types\SentWebAppMessage;
use Shanginn\TelegramBotApiBindings\Types\ShippingAddress;
use Shanginn\TelegramBotApiBindings\Types\ShippingOption;
use Shanginn\TelegramBotApiBindings\Types\ShippingQuery;
use Shanginn\TelegramBotApiBindings\Types\Sticker;
use Shanginn\TelegramBotApiBindings\Types\StickerSet;
use Shanginn\TelegramBotApiBindings\Types\Story;
use Shanginn\TelegramBotApiBindings\Types\SuccessfulPayment;
use Shanginn\TelegramBotApiBindings\Types\SwitchInlineQueryChosenChat;
use Shanginn\TelegramBotApiBindings\Types\TypeInterface;
use Shanginn\TelegramBotApiBindings\Types\Update;
use Shanginn\TelegramBotApiBindings\Types\User;
use Shanginn\TelegramBotApiBindings\Types\UserProfilePhotos;
use Shanginn\TelegramBotApiBindings\Types\UserShared;
use Shanginn\TelegramBotApiBindings\Types\Venue;
use Shanginn\TelegramBotApiBindings\Types\Video;
use Shanginn\TelegramBotApiBindings\Types\VideoChatEnded;
use Shanginn\TelegramBotApiBindings\Types\VideoChatParticipantsInvited;
use Shanginn\TelegramBotApiBindings\Types\VideoChatScheduled;
use Shanginn\TelegramBotApiBindings\Types\VideoChatStarted;
use Shanginn\TelegramBotApiBindings\Types\VideoNote;
use Shanginn\TelegramBotApiBindings\Types\Voice;
use Shanginn\TelegramBotApiBindings\Types\WebAppData;
use Shanginn\TelegramBotApiBindings\Types\WebAppInfo;
use Shanginn\TelegramBotApiBindings\Types\WebhookInfo;
use Shanginn\TelegramBotApiBindings\Types\WriteAccessAllowed;

class TelegramBotApiSerializer implements TelegramBotApiSerializerInterface
{
    public function denormalizeUpdate(array $data): Update
    {
        $requiredFields = [
            'update_id',
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

        return new Update(
            updateId: $data['update_id'],
            message: ($data['message'] ?? null) !== null
                ? $this->denormalizeMessage($data['message'])
                : null,
            editedMessage: ($data['edited_message'] ?? null) !== null
                ? $this->denormalizeMessage($data['edited_message'])
                : null,
            channelPost: ($data['channel_post'] ?? null) !== null
                ? $this->denormalizeMessage($data['channel_post'])
                : null,
            editedChannelPost: ($data['edited_channel_post'] ?? null) !== null
                ? $this->denormalizeMessage($data['edited_channel_post'])
                : null,
            inlineQuery: ($data['inline_query'] ?? null) !== null
                ? $this->denormalizeInlineQuery($data['inline_query'])
                : null,
            chosenInlineResult: ($data['chosen_inline_result'] ?? null) !== null
                ? $this->denormalizeChosenInlineResult($data['chosen_inline_result'])
                : null,
            callbackQuery: ($data['callback_query'] ?? null) !== null
                ? $this->denormalizeCallbackQuery($data['callback_query'])
                : null,
            shippingQuery: ($data['shipping_query'] ?? null) !== null
                ? $this->denormalizeShippingQuery($data['shipping_query'])
                : null,
            preCheckoutQuery: ($data['pre_checkout_query'] ?? null) !== null
                ? $this->denormalizePreCheckoutQuery($data['pre_checkout_query'])
                : null,
            poll: ($data['poll'] ?? null) !== null
                ? $this->denormalizePoll($data['poll'])
                : null,
            pollAnswer: ($data['poll_answer'] ?? null) !== null
                ? $this->denormalizePollAnswer($data['poll_answer'])
                : null,
            myChatMember: ($data['my_chat_member'] ?? null) !== null
                ? $this->denormalizeChatMemberUpdated($data['my_chat_member'])
                : null,
            chatMember: ($data['chat_member'] ?? null) !== null
                ? $this->denormalizeChatMemberUpdated($data['chat_member'])
                : null,
            chatJoinRequest: ($data['chat_join_request'] ?? null) !== null
                ? $this->denormalizeChatJoinRequest($data['chat_join_request'])
                : null,
        );
    }

    public function denormalizeWebhookInfo(array $data): WebhookInfo
    {
        $requiredFields = [
            'url',
            'has_custom_certificate',
            'pending_update_count',
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

        return new WebhookInfo(
            url: $data['url'],
            hasCustomCertificate: $data['has_custom_certificate'],
            pendingUpdateCount: $data['pending_update_count'],
            ipAddress: $data['ip_address'] ?? null,
            lastErrorDate: $data['last_error_date'] ?? null,
            lastErrorMessage: $data['last_error_message'] ?? null,
            lastSynchronizationErrorDate: $data['last_synchronization_error_date'] ?? null,
            maxConnections: $data['max_connections'] ?? null,
            allowedUpdates: $data['allowed_updates'] ?? null,
        );
    }

    public function denormalizeUser(array $data): User
    {
        $requiredFields = [
            'id',
            'is_bot',
            'first_name',
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

        return new User(
            id: $data['id'],
            isBot: $data['is_bot'],
            firstName: $data['first_name'],
            lastName: $data['last_name'] ?? null,
            username: $data['username'] ?? null,
            languageCode: $data['language_code'] ?? null,
            isPremium: $data['is_premium'] ?? null,
            addedToAttachmentMenu: $data['added_to_attachment_menu'] ?? null,
            canJoinGroups: $data['can_join_groups'] ?? null,
            canReadAllGroupMessages: $data['can_read_all_group_messages'] ?? null,
            supportsInlineQueries: $data['supports_inline_queries'] ?? null,
        );
    }

    public function denormalizeChat(array $data): Chat
    {
        $requiredFields = [
            'id',
            'type',
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

        return new Chat(
            id: $data['id'],
            type: $data['type'],
            title: $data['title'] ?? null,
            username: $data['username'] ?? null,
            firstName: $data['first_name'] ?? null,
            lastName: $data['last_name'] ?? null,
            isForum: $data['is_forum'] ?? null,
            photo: ($data['photo'] ?? null) !== null
                ? $this->denormalizeChatPhoto($data['photo'])
                : null,
            activeUsernames: $data['active_usernames'] ?? null,
            emojiStatusCustomEmojiId: $data['emoji_status_custom_emoji_id'] ?? null,
            emojiStatusExpirationDate: $data['emoji_status_expiration_date'] ?? null,
            bio: $data['bio'] ?? null,
            hasPrivateForwards: $data['has_private_forwards'] ?? null,
            hasRestrictedVoiceAndVideoMessages: $data['has_restricted_voice_and_video_messages'] ?? null,
            joinToSendMessages: $data['join_to_send_messages'] ?? null,
            joinByRequest: $data['join_by_request'] ?? null,
            description: $data['description'] ?? null,
            inviteLink: $data['invite_link'] ?? null,
            pinnedMessage: ($data['pinned_message'] ?? null) !== null
                ? $this->denormalizeMessage($data['pinned_message'])
                : null,
            permissions: ($data['permissions'] ?? null) !== null
                ? $this->denormalizeChatPermissions($data['permissions'])
                : null,
            slowModeDelay: $data['slow_mode_delay'] ?? null,
            messageAutoDeleteTime: $data['message_auto_delete_time'] ?? null,
            hasAggressiveAntiSpamEnabled: $data['has_aggressive_anti_spam_enabled'] ?? null,
            hasHiddenMembers: $data['has_hidden_members'] ?? null,
            hasProtectedContent: $data['has_protected_content'] ?? null,
            stickerSetName: $data['sticker_set_name'] ?? null,
            canSetStickerSet: $data['can_set_sticker_set'] ?? null,
            linkedChatId: $data['linked_chat_id'] ?? null,
            location: ($data['location'] ?? null) !== null
                ? $this->denormalizeChatLocation($data['location'])
                : null,
        );
    }

    public function denormalizeMessage(array $data): Message
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

        return new Message(
            messageId: $data['message_id'],
            date: $data['date'],
            chat: $this->denormalizeChat($data['chat']),
            messageThreadId: $data['message_thread_id'] ?? null,
            from: ($data['from'] ?? null) !== null
                ? $this->denormalizeUser($data['from'])
                : null,
            senderChat: ($data['sender_chat'] ?? null) !== null
                ? $this->denormalizeChat($data['sender_chat'])
                : null,
            forwardFrom: ($data['forward_from'] ?? null) !== null
                ? $this->denormalizeUser($data['forward_from'])
                : null,
            forwardFromChat: ($data['forward_from_chat'] ?? null) !== null
                ? $this->denormalizeChat($data['forward_from_chat'])
                : null,
            forwardFromMessageId: $data['forward_from_message_id'] ?? null,
            forwardSignature: $data['forward_signature'] ?? null,
            forwardSenderName: $data['forward_sender_name'] ?? null,
            forwardDate: $data['forward_date'] ?? null,
            isTopicMessage: $data['is_topic_message'] ?? null,
            isAutomaticForward: $data['is_automatic_forward'] ?? null,
            replyToMessage: ($data['reply_to_message'] ?? null) !== null
                ? $this->denormalizeMessage($data['reply_to_message'])
                : null,
            viaBot: ($data['via_bot'] ?? null) !== null
                ? $this->denormalizeUser($data['via_bot'])
                : null,
            editDate: $data['edit_date'] ?? null,
            hasProtectedContent: $data['has_protected_content'] ?? null,
            mediaGroupId: $data['media_group_id'] ?? null,
            authorSignature: $data['author_signature'] ?? null,
            text: $data['text'] ?? null,
            entities: $data['entities'] ?? null,
            animation: ($data['animation'] ?? null) !== null
                ? $this->denormalizeAnimation($data['animation'])
                : null,
            audio: ($data['audio'] ?? null) !== null
                ? $this->denormalizeAudio($data['audio'])
                : null,
            document: ($data['document'] ?? null) !== null
                ? $this->denormalizeDocument($data['document'])
                : null,
            photo: $data['photo'] ?? null,
            sticker: ($data['sticker'] ?? null) !== null
                ? $this->denormalizeSticker($data['sticker'])
                : null,
            story: ($data['story'] ?? null) !== null
                ? $this->denormalizeStory($data['story'])
                : null,
            video: ($data['video'] ?? null) !== null
                ? $this->denormalizeVideo($data['video'])
                : null,
            videoNote: ($data['video_note'] ?? null) !== null
                ? $this->denormalizeVideoNote($data['video_note'])
                : null,
            voice: ($data['voice'] ?? null) !== null
                ? $this->denormalizeVoice($data['voice'])
                : null,
            caption: $data['caption'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            hasMediaSpoiler: $data['has_media_spoiler'] ?? null,
            contact: ($data['contact'] ?? null) !== null
                ? $this->denormalizeContact($data['contact'])
                : null,
            dice: ($data['dice'] ?? null) !== null
                ? $this->denormalizeDice($data['dice'])
                : null,
            game: ($data['game'] ?? null) !== null
                ? $this->denormalizeGame($data['game'])
                : null,
            poll: ($data['poll'] ?? null) !== null
                ? $this->denormalizePoll($data['poll'])
                : null,
            venue: ($data['venue'] ?? null) !== null
                ? $this->denormalizeVenue($data['venue'])
                : null,
            location: ($data['location'] ?? null) !== null
                ? $this->denormalizeLocation($data['location'])
                : null,
            newChatMembers: $data['new_chat_members'] ?? null,
            leftChatMember: ($data['left_chat_member'] ?? null) !== null
                ? $this->denormalizeUser($data['left_chat_member'])
                : null,
            newChatTitle: $data['new_chat_title'] ?? null,
            newChatPhoto: $data['new_chat_photo'] ?? null,
            deleteChatPhoto: $data['delete_chat_photo'] ?? null,
            groupChatCreated: $data['group_chat_created'] ?? null,
            supergroupChatCreated: $data['supergroup_chat_created'] ?? null,
            channelChatCreated: $data['channel_chat_created'] ?? null,
            messageAutoDeleteTimerChanged: ($data['message_auto_delete_timer_changed'] ?? null) !== null
                ? $this->denormalizeMessageAutoDeleteTimerChanged($data['message_auto_delete_timer_changed'])
                : null,
            migrateToChatId: $data['migrate_to_chat_id'] ?? null,
            migrateFromChatId: $data['migrate_from_chat_id'] ?? null,
            pinnedMessage: ($data['pinned_message'] ?? null) !== null
                ? $this->denormalizeMessage($data['pinned_message'])
                : null,
            invoice: ($data['invoice'] ?? null) !== null
                ? $this->denormalizeInvoice($data['invoice'])
                : null,
            successfulPayment: ($data['successful_payment'] ?? null) !== null
                ? $this->denormalizeSuccessfulPayment($data['successful_payment'])
                : null,
            userShared: ($data['user_shared'] ?? null) !== null
                ? $this->denormalizeUserShared($data['user_shared'])
                : null,
            chatShared: ($data['chat_shared'] ?? null) !== null
                ? $this->denormalizeChatShared($data['chat_shared'])
                : null,
            connectedWebsite: $data['connected_website'] ?? null,
            writeAccessAllowed: ($data['write_access_allowed'] ?? null) !== null
                ? $this->denormalizeWriteAccessAllowed($data['write_access_allowed'])
                : null,
            passportData: ($data['passport_data'] ?? null) !== null
                ? $this->denormalizePassportData($data['passport_data'])
                : null,
            proximityAlertTriggered: ($data['proximity_alert_triggered'] ?? null) !== null
                ? $this->denormalizeProximityAlertTriggered($data['proximity_alert_triggered'])
                : null,
            forumTopicCreated: ($data['forum_topic_created'] ?? null) !== null
                ? $this->denormalizeForumTopicCreated($data['forum_topic_created'])
                : null,
            forumTopicEdited: ($data['forum_topic_edited'] ?? null) !== null
                ? $this->denormalizeForumTopicEdited($data['forum_topic_edited'])
                : null,
            forumTopicClosed: ($data['forum_topic_closed'] ?? null) !== null
                ? $this->denormalizeForumTopicClosed($data['forum_topic_closed'])
                : null,
            forumTopicReopened: ($data['forum_topic_reopened'] ?? null) !== null
                ? $this->denormalizeForumTopicReopened($data['forum_topic_reopened'])
                : null,
            generalForumTopicHidden: ($data['general_forum_topic_hidden'] ?? null) !== null
                ? $this->denormalizeGeneralForumTopicHidden($data['general_forum_topic_hidden'])
                : null,
            generalForumTopicUnhidden: ($data['general_forum_topic_unhidden'] ?? null) !== null
                ? $this->denormalizeGeneralForumTopicUnhidden($data['general_forum_topic_unhidden'])
                : null,
            videoChatScheduled: ($data['video_chat_scheduled'] ?? null) !== null
                ? $this->denormalizeVideoChatScheduled($data['video_chat_scheduled'])
                : null,
            videoChatStarted: ($data['video_chat_started'] ?? null) !== null
                ? $this->denormalizeVideoChatStarted($data['video_chat_started'])
                : null,
            videoChatEnded: ($data['video_chat_ended'] ?? null) !== null
                ? $this->denormalizeVideoChatEnded($data['video_chat_ended'])
                : null,
            videoChatParticipantsInvited: ($data['video_chat_participants_invited'] ?? null) !== null
                ? $this->denormalizeVideoChatParticipantsInvited($data['video_chat_participants_invited'])
                : null,
            webAppData: ($data['web_app_data'] ?? null) !== null
                ? $this->denormalizeWebAppData($data['web_app_data'])
                : null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
        );
    }

    public function denormalizeMessageId(array $data): MessageId
    {
        $requiredFields = [
            'message_id',
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

        return new MessageId(
            messageId: $data['message_id'],
        );
    }

    public function denormalizeMessageEntity(array $data): MessageEntity
    {
        $requiredFields = [
            'type',
            'offset',
            'length',
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

        return new MessageEntity(
            type: $data['type'],
            offset: $data['offset'],
            length: $data['length'],
            url: $data['url'] ?? null,
            user: ($data['user'] ?? null) !== null
                ? $this->denormalizeUser($data['user'])
                : null,
            language: $data['language'] ?? null,
            customEmojiId: $data['custom_emoji_id'] ?? null,
        );
    }

    public function denormalizePhotoSize(array $data): PhotoSize
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'width',
            'height',
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

        return new PhotoSize(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            width: $data['width'],
            height: $data['height'],
            fileSize: $data['file_size'] ?? null,
        );
    }

    public function denormalizeAnimation(array $data): Animation
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'width',
            'height',
            'duration',
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

        return new Animation(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            width: $data['width'],
            height: $data['height'],
            duration: $data['duration'],
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizePhotoSize($data['thumbnail'])
                : null,
            fileName: $data['file_name'] ?? null,
            mimeType: $data['mime_type'] ?? null,
            fileSize: $data['file_size'] ?? null,
        );
    }

    public function denormalizeAudio(array $data): Audio
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'duration',
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

        return new Audio(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            duration: $data['duration'],
            performer: $data['performer'] ?? null,
            title: $data['title'] ?? null,
            fileName: $data['file_name'] ?? null,
            mimeType: $data['mime_type'] ?? null,
            fileSize: $data['file_size'] ?? null,
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizePhotoSize($data['thumbnail'])
                : null,
        );
    }

    public function denormalizeDocument(array $data): Document
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
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

        return new Document(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizePhotoSize($data['thumbnail'])
                : null,
            fileName: $data['file_name'] ?? null,
            mimeType: $data['mime_type'] ?? null,
            fileSize: $data['file_size'] ?? null,
        );
    }

    public function denormalizeStory(array $data): Story
    {
        return new Story();
    }

    public function denormalizeVideo(array $data): Video
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'width',
            'height',
            'duration',
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

        return new Video(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            width: $data['width'],
            height: $data['height'],
            duration: $data['duration'],
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizePhotoSize($data['thumbnail'])
                : null,
            fileName: $data['file_name'] ?? null,
            mimeType: $data['mime_type'] ?? null,
            fileSize: $data['file_size'] ?? null,
        );
    }

    public function denormalizeVideoNote(array $data): VideoNote
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'length',
            'duration',
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

        return new VideoNote(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            length: $data['length'],
            duration: $data['duration'],
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizePhotoSize($data['thumbnail'])
                : null,
            fileSize: $data['file_size'] ?? null,
        );
    }

    public function denormalizeVoice(array $data): Voice
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'duration',
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

        return new Voice(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            duration: $data['duration'],
            mimeType: $data['mime_type'] ?? null,
            fileSize: $data['file_size'] ?? null,
        );
    }

    public function denormalizeContact(array $data): Contact
    {
        $requiredFields = [
            'phone_number',
            'first_name',
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

        return new Contact(
            phoneNumber: $data['phone_number'],
            firstName: $data['first_name'],
            lastName: $data['last_name'] ?? null,
            userId: $data['user_id'] ?? null,
            vcard: $data['vcard'] ?? null,
        );
    }

    public function denormalizeDice(array $data): Dice
    {
        $requiredFields = [
            'emoji',
            'value',
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

        return new Dice(
            emoji: $data['emoji'],
            value: $data['value'],
        );
    }

    public function denormalizePollOption(array $data): PollOption
    {
        $requiredFields = [
            'text',
            'voter_count',
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

        return new PollOption(
            text: $data['text'],
            voterCount: $data['voter_count'],
        );
    }

    public function denormalizePollAnswer(array $data): PollAnswer
    {
        $requiredFields = [
            'poll_id',
            'option_ids',
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

        return new PollAnswer(
            pollId: $data['poll_id'],
            optionIds: $data['option_ids'],
            voterChat: ($data['voter_chat'] ?? null) !== null
                ? $this->denormalizeChat($data['voter_chat'])
                : null,
            user: ($data['user'] ?? null) !== null
                ? $this->denormalizeUser($data['user'])
                : null,
        );
    }

    public function denormalizePoll(array $data): Poll
    {
        $requiredFields = [
            'id',
            'question',
            'options',
            'total_voter_count',
            'is_closed',
            'is_anonymous',
            'type',
            'allows_multiple_answers',
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

        return new Poll(
            id: $data['id'],
            question: $data['question'],
            options: $data['options'],
            totalVoterCount: $data['total_voter_count'],
            isClosed: $data['is_closed'],
            isAnonymous: $data['is_anonymous'],
            type: $data['type'],
            allowsMultipleAnswers: $data['allows_multiple_answers'],
            correctOptionId: $data['correct_option_id'] ?? null,
            explanation: $data['explanation'] ?? null,
            explanationEntities: $data['explanation_entities'] ?? null,
            openPeriod: $data['open_period'] ?? null,
            closeDate: $data['close_date'] ?? null,
        );
    }

    public function denormalizeLocation(array $data): Location
    {
        $requiredFields = [
            'longitude',
            'latitude',
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

        return new Location(
            longitude: $data['longitude'],
            latitude: $data['latitude'],
            horizontalAccuracy: $data['horizontal_accuracy'] ?? null,
            livePeriod: $data['live_period'] ?? null,
            heading: $data['heading'] ?? null,
            proximityAlertRadius: $data['proximity_alert_radius'] ?? null,
        );
    }

    public function denormalizeVenue(array $data): Venue
    {
        $requiredFields = [
            'location',
            'title',
            'address',
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

        return new Venue(
            location: $this->denormalizeLocation($data['location']),
            title: $data['title'],
            address: $data['address'],
            foursquareId: $data['foursquare_id'] ?? null,
            foursquareType: $data['foursquare_type'] ?? null,
            googlePlaceId: $data['google_place_id'] ?? null,
            googlePlaceType: $data['google_place_type'] ?? null,
        );
    }

    public function denormalizeWebAppData(array $data): WebAppData
    {
        $requiredFields = [
            'data',
            'button_text',
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

        return new WebAppData(
            data: $data['data'],
            buttonText: $data['button_text'],
        );
    }

    public function denormalizeProximityAlertTriggered(array $data): ProximityAlertTriggered
    {
        $requiredFields = [
            'traveler',
            'watcher',
            'distance',
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

        return new ProximityAlertTriggered(
            traveler: $this->denormalizeUser($data['traveler']),
            watcher: $this->denormalizeUser($data['watcher']),
            distance: $data['distance'],
        );
    }

    public function denormalizeMessageAutoDeleteTimerChanged(array $data): MessageAutoDeleteTimerChanged
    {
        $requiredFields = [
            'message_auto_delete_time',
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

        return new MessageAutoDeleteTimerChanged(
            messageAutoDeleteTime: $data['message_auto_delete_time'],
        );
    }

    public function denormalizeForumTopicCreated(array $data): ForumTopicCreated
    {
        $requiredFields = [
            'name',
            'icon_color',
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

        return new ForumTopicCreated(
            name: $data['name'],
            iconColor: $data['icon_color'],
            iconCustomEmojiId: $data['icon_custom_emoji_id'] ?? null,
        );
    }

    public function denormalizeForumTopicClosed(array $data): ForumTopicClosed
    {
        return new ForumTopicClosed();
    }

    public function denormalizeForumTopicEdited(array $data): ForumTopicEdited
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

        return new ForumTopicEdited(
            name: $data['name'] ?? null,
            iconCustomEmojiId: $data['icon_custom_emoji_id'] ?? null,
        );
    }

    public function denormalizeForumTopicReopened(array $data): ForumTopicReopened
    {
        return new ForumTopicReopened();
    }

    public function denormalizeGeneralForumTopicHidden(array $data): GeneralForumTopicHidden
    {
        return new GeneralForumTopicHidden();
    }

    public function denormalizeGeneralForumTopicUnhidden(array $data): GeneralForumTopicUnhidden
    {
        return new GeneralForumTopicUnhidden();
    }

    public function denormalizeUserShared(array $data): UserShared
    {
        $requiredFields = [
            'request_id',
            'user_id',
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

        return new UserShared(
            requestId: $data['request_id'],
            userId: $data['user_id'],
        );
    }

    public function denormalizeChatShared(array $data): ChatShared
    {
        $requiredFields = [
            'request_id',
            'chat_id',
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

        return new ChatShared(
            requestId: $data['request_id'],
            chatId: $data['chat_id'],
        );
    }

    public function denormalizeWriteAccessAllowed(array $data): WriteAccessAllowed
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

        return new WriteAccessAllowed(
            fromRequest: $data['from_request'] ?? null,
            webAppName: $data['web_app_name'] ?? null,
            fromAttachmentMenu: $data['from_attachment_menu'] ?? null,
        );
    }

    public function denormalizeVideoChatScheduled(array $data): VideoChatScheduled
    {
        $requiredFields = [
            'start_date',
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

        return new VideoChatScheduled(
            startDate: $data['start_date'],
        );
    }

    public function denormalizeVideoChatStarted(array $data): VideoChatStarted
    {
        return new VideoChatStarted();
    }

    public function denormalizeVideoChatEnded(array $data): VideoChatEnded
    {
        $requiredFields = [
            'duration',
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

        return new VideoChatEnded(
            duration: $data['duration'],
        );
    }

    public function denormalizeVideoChatParticipantsInvited(array $data): VideoChatParticipantsInvited
    {
        $requiredFields = [
            'users',
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

        return new VideoChatParticipantsInvited(
            users: $data['users'],
        );
    }

    public function denormalizeUserProfilePhotos(array $data): UserProfilePhotos
    {
        $requiredFields = [
            'total_count',
            'photos',
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

        return new UserProfilePhotos(
            totalCount: $data['total_count'],
            photos: $data['photos'],
        );
    }

    public function denormalizeFile(array $data): File
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
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

        return new File(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            fileSize: $data['file_size'] ?? null,
            filePath: $data['file_path'] ?? null,
        );
    }

    public function denormalizeWebAppInfo(array $data): WebAppInfo
    {
        $requiredFields = [
            'url',
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

        return new WebAppInfo(
            url: $data['url'],
        );
    }

    public function denormalizeReplyKeyboardMarkup(array $data): ReplyKeyboardMarkup
    {
        $requiredFields = [
            'keyboard',
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

        return new ReplyKeyboardMarkup(
            keyboard: $data['keyboard'],
            isPersistent: $data['is_persistent'] ?? null,
            resizeKeyboard: $data['resize_keyboard'] ?? null,
            oneTimeKeyboard: $data['one_time_keyboard'] ?? null,
            inputFieldPlaceholder: $data['input_field_placeholder'] ?? null,
            selective: $data['selective'] ?? null,
        );
    }

    public function denormalizeKeyboardButton(array $data): KeyboardButton
    {
        $requiredFields = [
            'text',
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

        return new KeyboardButton(
            text: $data['text'],
            requestUser: ($data['request_user'] ?? null) !== null
                ? $this->denormalizeKeyboardButtonRequestUser($data['request_user'])
                : null,
            requestChat: ($data['request_chat'] ?? null) !== null
                ? $this->denormalizeKeyboardButtonRequestChat($data['request_chat'])
                : null,
            requestContact: $data['request_contact'] ?? null,
            requestLocation: $data['request_location'] ?? null,
            requestPoll: ($data['request_poll'] ?? null) !== null
                ? $this->denormalizeKeyboardButtonPollType($data['request_poll'])
                : null,
            webApp: ($data['web_app'] ?? null) !== null
                ? $this->denormalizeWebAppInfo($data['web_app'])
                : null,
        );
    }

    public function denormalizeKeyboardButtonRequestUser(array $data): KeyboardButtonRequestUser
    {
        $requiredFields = [
            'request_id',
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

        return new KeyboardButtonRequestUser(
            requestId: $data['request_id'],
            userIsBot: $data['user_is_bot'] ?? null,
            userIsPremium: $data['user_is_premium'] ?? null,
        );
    }

    public function denormalizeKeyboardButtonRequestChat(array $data): KeyboardButtonRequestChat
    {
        $requiredFields = [
            'request_id',
            'chat_is_channel',
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

        return new KeyboardButtonRequestChat(
            requestId: $data['request_id'],
            chatIsChannel: $data['chat_is_channel'],
            chatIsForum: $data['chat_is_forum'] ?? null,
            chatHasUsername: $data['chat_has_username'] ?? null,
            chatIsCreated: $data['chat_is_created'] ?? null,
            userAdministratorRights: ($data['user_administrator_rights'] ?? null) !== null
                ? $this->denormalizeChatAdministratorRights($data['user_administrator_rights'])
                : null,
            botAdministratorRights: ($data['bot_administrator_rights'] ?? null) !== null
                ? $this->denormalizeChatAdministratorRights($data['bot_administrator_rights'])
                : null,
            botIsMember: $data['bot_is_member'] ?? null,
        );
    }

    public function denormalizeKeyboardButtonPollType(array $data): KeyboardButtonPollType
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

        return new KeyboardButtonPollType(
            type: $data['type'] ?? null,
        );
    }

    public function denormalizeReplyKeyboardRemove(array $data): ReplyKeyboardRemove
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

        return new ReplyKeyboardRemove(
            removeKeyboard: $data['remove_keyboard'] ?? true,
            selective: $data['selective'] ?? null,
        );
    }

    public function denormalizeInlineKeyboardMarkup(array $data): InlineKeyboardMarkup
    {
        $requiredFields = [
            'inline_keyboard',
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

        return new InlineKeyboardMarkup(
            inlineKeyboard: $data['inline_keyboard'],
        );
    }

    public function denormalizeInlineKeyboardButton(array $data): InlineKeyboardButton
    {
        $requiredFields = [
            'text',
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

        return new InlineKeyboardButton(
            text: $data['text'],
            url: $data['url'] ?? null,
            callbackData: $data['callback_data'] ?? null,
            webApp: ($data['web_app'] ?? null) !== null
                ? $this->denormalizeWebAppInfo($data['web_app'])
                : null,
            loginUrl: ($data['login_url'] ?? null) !== null
                ? $this->denormalizeLoginUrl($data['login_url'])
                : null,
            switchInlineQuery: $data['switch_inline_query'] ?? null,
            switchInlineQueryCurrentChat: $data['switch_inline_query_current_chat'] ?? null,
            switchInlineQueryChosenChat: ($data['switch_inline_query_chosen_chat'] ?? null) !== null
                ? $this->denormalizeSwitchInlineQueryChosenChat($data['switch_inline_query_chosen_chat'])
                : null,
            callbackGame: ($data['callback_game'] ?? null) !== null
                ? $this->denormalizeCallbackGame($data['callback_game'])
                : null,
            pay: $data['pay'] ?? null,
        );
    }

    public function denormalizeLoginUrl(array $data): LoginUrl
    {
        $requiredFields = [
            'url',
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

        return new LoginUrl(
            url: $data['url'],
            forwardText: $data['forward_text'] ?? null,
            botUsername: $data['bot_username'] ?? null,
            requestWriteAccess: $data['request_write_access'] ?? null,
        );
    }

    public function denormalizeSwitchInlineQueryChosenChat(array $data): SwitchInlineQueryChosenChat
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

        return new SwitchInlineQueryChosenChat(
            query: $data['query'] ?? null,
            allowUserChats: $data['allow_user_chats'] ?? null,
            allowBotChats: $data['allow_bot_chats'] ?? null,
            allowGroupChats: $data['allow_group_chats'] ?? null,
            allowChannelChats: $data['allow_channel_chats'] ?? null,
        );
    }

    public function denormalizeCallbackQuery(array $data): CallbackQuery
    {
        $requiredFields = [
            'id',
            'from',
            'chat_instance',
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

        return new CallbackQuery(
            id: $data['id'],
            from: $this->denormalizeUser($data['from']),
            chatInstance: $data['chat_instance'],
            message: ($data['message'] ?? null) !== null
                ? $this->denormalizeMessage($data['message'])
                : null,
            inlineMessageId: $data['inline_message_id'] ?? null,
            data: $data['data'] ?? null,
            gameShortName: $data['game_short_name'] ?? null,
        );
    }

    public function denormalizeForceReply(array $data): ForceReply
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

        return new ForceReply(
            forceReply: $data['force_reply'] ?? true,
            inputFieldPlaceholder: $data['input_field_placeholder'] ?? null,
            selective: $data['selective'] ?? null,
        );
    }

    public function denormalizeChatPhoto(array $data): ChatPhoto
    {
        $requiredFields = [
            'small_file_id',
            'small_file_unique_id',
            'big_file_id',
            'big_file_unique_id',
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

        return new ChatPhoto(
            smallFileId: $data['small_file_id'],
            smallFileUniqueId: $data['small_file_unique_id'],
            bigFileId: $data['big_file_id'],
            bigFileUniqueId: $data['big_file_unique_id'],
        );
    }

    public function denormalizeChatInviteLink(array $data): ChatInviteLink
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

        return new ChatInviteLink(
            inviteLink: $data['invite_link'],
            creator: $this->denormalizeUser($data['creator']),
            createsJoinRequest: $data['creates_join_request'],
            isPrimary: $data['is_primary'],
            isRevoked: $data['is_revoked'],
            name: $data['name'] ?? null,
            expireDate: $data['expire_date'] ?? null,
            memberLimit: $data['member_limit'] ?? null,
            pendingJoinRequestCount: $data['pending_join_request_count'] ?? null,
        );
    }

    public function denormalizeChatAdministratorRights(array $data): ChatAdministratorRights
    {
        $requiredFields = [
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

        return new ChatAdministratorRights(
            isAnonymous: $data['is_anonymous'],
            canManageChat: $data['can_manage_chat'],
            canDeleteMessages: $data['can_delete_messages'],
            canManageVideoChats: $data['can_manage_video_chats'],
            canRestrictMembers: $data['can_restrict_members'],
            canPromoteMembers: $data['can_promote_members'],
            canChangeInfo: $data['can_change_info'],
            canInviteUsers: $data['can_invite_users'],
            canPostMessages: $data['can_post_messages'] ?? null,
            canEditMessages: $data['can_edit_messages'] ?? null,
            canPinMessages: $data['can_pin_messages'] ?? null,
            canPostStories: $data['can_post_stories'] ?? null,
            canEditStories: $data['can_edit_stories'] ?? null,
            canDeleteStories: $data['can_delete_stories'] ?? null,
            canManageTopics: $data['can_manage_topics'] ?? null,
        );
    }

    public function denormalizeChatMember(array $data): Types\ChatMember
    {
        return new ChatMember();
    }

    public function denormalizeChatMemberOwner(array $data): ChatMemberOwner
    {
        $requiredFields = [
            'status',
            'user',
            'is_anonymous',
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

        return new ChatMemberOwner(
            status: $data['status'],
            user: $this->denormalizeUser($data['user']),
            isAnonymous: $data['is_anonymous'],
            customTitle: $data['custom_title'] ?? null,
        );
    }

    public function denormalizeChatMemberAdministrator(array $data): ChatMemberAdministrator
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

        return new ChatMemberAdministrator(
            status: $data['status'],
            user: $this->denormalizeUser($data['user']),
            canBeEdited: $data['can_be_edited'],
            isAnonymous: $data['is_anonymous'],
            canManageChat: $data['can_manage_chat'],
            canDeleteMessages: $data['can_delete_messages'],
            canManageVideoChats: $data['can_manage_video_chats'],
            canRestrictMembers: $data['can_restrict_members'],
            canPromoteMembers: $data['can_promote_members'],
            canChangeInfo: $data['can_change_info'],
            canInviteUsers: $data['can_invite_users'],
            canPostMessages: $data['can_post_messages'] ?? null,
            canEditMessages: $data['can_edit_messages'] ?? null,
            canPinMessages: $data['can_pin_messages'] ?? null,
            canPostStories: $data['can_post_stories'] ?? null,
            canEditStories: $data['can_edit_stories'] ?? null,
            canDeleteStories: $data['can_delete_stories'] ?? null,
            canManageTopics: $data['can_manage_topics'] ?? null,
            customTitle: $data['custom_title'] ?? null,
        );
    }

    public function denormalizeChatMemberMember(array $data): ChatMemberMember
    {
        $requiredFields = [
            'status',
            'user',
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

        return new ChatMemberMember(
            status: $data['status'],
            user: $this->denormalizeUser($data['user']),
        );
    }

    public function denormalizeChatMemberRestricted(array $data): ChatMemberRestricted
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
            if (!isset($result[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new ChatMemberRestricted(
            status: $data['status'],
            user: $this->denormalizeUser($data['user']),
            isMember: $data['is_member'],
            canSendMessages: $data['can_send_messages'],
            canSendAudios: $data['can_send_audios'],
            canSendDocuments: $data['can_send_documents'],
            canSendPhotos: $data['can_send_photos'],
            canSendVideos: $data['can_send_videos'],
            canSendVideoNotes: $data['can_send_video_notes'],
            canSendVoiceNotes: $data['can_send_voice_notes'],
            canSendPolls: $data['can_send_polls'],
            canSendOtherMessages: $data['can_send_other_messages'],
            canAddWebPagePreviews: $data['can_add_web_page_previews'],
            canChangeInfo: $data['can_change_info'],
            canInviteUsers: $data['can_invite_users'],
            canPinMessages: $data['can_pin_messages'],
            canManageTopics: $data['can_manage_topics'],
            untilDate: $data['until_date'],
        );
    }

    public function denormalizeChatMemberLeft(array $data): ChatMemberLeft
    {
        $requiredFields = [
            'status',
            'user',
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

        return new ChatMemberLeft(
            status: $data['status'],
            user: $this->denormalizeUser($data['user']),
        );
    }

    public function denormalizeChatMemberBanned(array $data): ChatMemberBanned
    {
        $requiredFields = [
            'status',
            'user',
            'until_date',
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

        return new ChatMemberBanned(
            status: $data['status'],
            user: $this->denormalizeUser($data['user']),
            untilDate: $data['until_date'],
        );
    }

    public function denormalizeChatMemberUpdated(array $data): ChatMemberUpdated
    {
        $requiredFields = [
            'chat',
            'from',
            'date',
            'old_chat_member',
            'new_chat_member',
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

        return new ChatMemberUpdated(
            chat: $this->denormalizeChat($data['chat']),
            from: $this->denormalizeUser($data['from']),
            date: $data['date'],
            oldChatMember: $this->denormalizeChatMember($data['old_chat_member']),
            newChatMember: $this->denormalizeChatMember($data['new_chat_member']),
            inviteLink: ($data['invite_link'] ?? null) !== null
                ? $this->denormalizeChatInviteLink($data['invite_link'])
                : null,
            viaChatFolderInviteLink: $data['via_chat_folder_invite_link'] ?? null,
        );
    }

    public function denormalizeChatJoinRequest(array $data): ChatJoinRequest
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

        return new ChatJoinRequest(
            chat: $this->denormalizeChat($data['chat']),
            from: $this->denormalizeUser($data['from']),
            userChatId: $data['user_chat_id'],
            date: $data['date'],
            bio: $data['bio'] ?? null,
            inviteLink: ($data['invite_link'] ?? null) !== null
                ? $this->denormalizeChatInviteLink($data['invite_link'])
                : null,
        );
    }

    public function denormalizeChatPermissions(array $data): ChatPermissions
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

        return new ChatPermissions(
            canSendMessages: $data['can_send_messages'] ?? null,
            canSendAudios: $data['can_send_audios'] ?? null,
            canSendDocuments: $data['can_send_documents'] ?? null,
            canSendPhotos: $data['can_send_photos'] ?? null,
            canSendVideos: $data['can_send_videos'] ?? null,
            canSendVideoNotes: $data['can_send_video_notes'] ?? null,
            canSendVoiceNotes: $data['can_send_voice_notes'] ?? null,
            canSendPolls: $data['can_send_polls'] ?? null,
            canSendOtherMessages: $data['can_send_other_messages'] ?? null,
            canAddWebPagePreviews: $data['can_add_web_page_previews'] ?? null,
            canChangeInfo: $data['can_change_info'] ?? null,
            canInviteUsers: $data['can_invite_users'] ?? null,
            canPinMessages: $data['can_pin_messages'] ?? null,
            canManageTopics: $data['can_manage_topics'] ?? null,
        );
    }

    public function denormalizeChatLocation(array $data): ChatLocation
    {
        $requiredFields = [
            'location',
            'address',
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

        return new ChatLocation(
            location: $this->denormalizeLocation($data['location']),
            address: $data['address'],
        );
    }

    public function denormalizeForumTopic(array $data): ForumTopic
    {
        $requiredFields = [
            'message_thread_id',
            'name',
            'icon_color',
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

        return new ForumTopic(
            messageThreadId: $data['message_thread_id'],
            name: $data['name'],
            iconColor: $data['icon_color'],
            iconCustomEmojiId: $data['icon_custom_emoji_id'] ?? null,
        );
    }

    public function denormalizeBotCommand(array $data): BotCommand
    {
        $requiredFields = [
            'command',
            'description',
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

        return new BotCommand(
            command: $data['command'],
            description: $data['description'],
        );
    }

    public function denormalizeBotCommandScope(array $data): Types\BotCommandScope
    {
        return new BotCommandScope();
    }

    public function denormalizeBotCommandScopeDefault(array $data): BotCommandScopeDefault
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

        return new BotCommandScopeDefault(
            type: $data['type'] ?? 'default',
        );
    }

    public function denormalizeBotCommandScopeAllPrivateChats(array $data): BotCommandScopeAllPrivateChats
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

        return new BotCommandScopeAllPrivateChats(
            type: $data['type'] ?? 'all_private_chats',
        );
    }

    public function denormalizeBotCommandScopeAllGroupChats(array $data): BotCommandScopeAllGroupChats
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

        return new BotCommandScopeAllGroupChats(
            type: $data['type'] ?? 'all_group_chats',
        );
    }

    public function denormalizeBotCommandScopeAllChatAdministrators(array $data): BotCommandScopeAllChatAdministrators
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

        return new BotCommandScopeAllChatAdministrators(
            type: $data['type'] ?? 'all_chat_administrators',
        );
    }

    public function denormalizeBotCommandScopeChat(array $data): BotCommandScopeChat
    {
        $requiredFields = [
            'chat_id',
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

        return new BotCommandScopeChat(
            chatId: $this->denormalizeint | string($data['chat_id']),
            type: $data['type'] ?? 'chat',
        );
    }

    public function denormalizeBotCommandScopeChatAdministrators(array $data): BotCommandScopeChatAdministrators
    {
        $requiredFields = [
            'chat_id',
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

        return new BotCommandScopeChatAdministrators(
            chatId: $this->denormalizeint | string($data['chat_id']),
            type: $data['type'] ?? 'chat_administrators',
        );
    }

    public function denormalizeBotCommandScopeChatMember(array $data): BotCommandScopeChatMember
    {
        $requiredFields = [
            'chat_id',
            'user_id',
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

        return new BotCommandScopeChatMember(
            chatId: $this->denormalizeint | string($data['chat_id']),
            userId: $data['user_id'],
            type: $data['type'] ?? 'chat_member',
        );
    }

    public function denormalizeBotName(array $data): BotName
    {
        $requiredFields = [
            'name',
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

        return new BotName(
            name: $data['name'],
        );
    }

    public function denormalizeBotDescription(array $data): BotDescription
    {
        $requiredFields = [
            'description',
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

        return new BotDescription(
            description: $data['description'],
        );
    }

    public function denormalizeBotShortDescription(array $data): BotShortDescription
    {
        $requiredFields = [
            'short_description',
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

        return new BotShortDescription(
            shortDescription: $data['short_description'],
        );
    }

    public function denormalizeMenuButton(array $data): Types\MenuButton
    {
        return new MenuButton();
    }

    public function denormalizeMenuButtonCommands(array $data): MenuButtonCommands
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

        return new MenuButtonCommands(
            type: $data['type'] ?? 'commands',
        );
    }

    public function denormalizeMenuButtonWebApp(array $data): MenuButtonWebApp
    {
        $requiredFields = [
            'text',
            'web_app',
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

        return new MenuButtonWebApp(
            text: $data['text'],
            webApp: $this->denormalizeWebAppInfo($data['web_app']),
            type: $data['type'] ?? 'web_app',
        );
    }

    public function denormalizeMenuButtonDefault(array $data): MenuButtonDefault
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

        return new MenuButtonDefault(
            type: $data['type'] ?? 'default',
        );
    }

    public function denormalizeResponseParameters(array $data): ResponseParameters
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

        return new ResponseParameters(
            migrateToChatId: $data['migrate_to_chat_id'] ?? null,
            retryAfter: $data['retry_after'] ?? null,
        );
    }

    public function denormalizeInputMedia(array $data): Types\InputMedia
    {
        return new InputMedia();
    }

    public function denormalizeInputMediaPhoto(array $data): InputMediaPhoto
    {
        $requiredFields = [
            'media',
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

        return new InputMediaPhoto(
            media: $data['media'],
            type: $data['type'] ?? 'photo',
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            hasSpoiler: $data['has_spoiler'] ?? null,
        );
    }

    public function denormalizeInputMediaVideo(array $data): InputMediaVideo
    {
        $requiredFields = [
            'media',
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

        return new InputMediaVideo(
            media: $data['media'],
            type: $data['type'] ?? 'video',
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizeInputFile | string($data['thumbnail'])
                : null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            width: $data['width'] ?? null,
            height: $data['height'] ?? null,
            duration: $data['duration'] ?? null,
            supportsStreaming: $data['supports_streaming'] ?? null,
            hasSpoiler: $data['has_spoiler'] ?? null,
        );
    }

    public function denormalizeInputMediaAnimation(array $data): InputMediaAnimation
    {
        $requiredFields = [
            'media',
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

        return new InputMediaAnimation(
            media: $data['media'],
            type: $data['type'] ?? 'animation',
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizeInputFile | string($data['thumbnail'])
                : null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            width: $data['width'] ?? null,
            height: $data['height'] ?? null,
            duration: $data['duration'] ?? null,
            hasSpoiler: $data['has_spoiler'] ?? null,
        );
    }

    public function denormalizeInputMediaAudio(array $data): InputMediaAudio
    {
        $requiredFields = [
            'media',
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

        return new InputMediaAudio(
            media: $data['media'],
            type: $data['type'] ?? 'audio',
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizeInputFile | string($data['thumbnail'])
                : null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            duration: $data['duration'] ?? null,
            performer: $data['performer'] ?? null,
            title: $data['title'] ?? null,
        );
    }

    public function denormalizeInputMediaDocument(array $data): InputMediaDocument
    {
        $requiredFields = [
            'media',
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

        return new InputMediaDocument(
            media: $data['media'],
            type: $data['type'] ?? 'document',
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizeInputFile | string($data['thumbnail'])
                : null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            disableContentTypeDetection: $data['disable_content_type_detection'] ?? null,
        );
    }

    public function denormalizeInputFile(array $data): InputFile
    {
        return new InputFile();
    }

    public function denormalizeSticker(array $data): Sticker
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'type',
            'width',
            'height',
            'is_animated',
            'is_video',
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

        return new Sticker(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            type: $data['type'],
            width: $data['width'],
            height: $data['height'],
            isAnimated: $data['is_animated'],
            isVideo: $data['is_video'],
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizePhotoSize($data['thumbnail'])
                : null,
            emoji: $data['emoji'] ?? null,
            setName: $data['set_name'] ?? null,
            premiumAnimation: ($data['premium_animation'] ?? null) !== null
                ? $this->denormalizeFile($data['premium_animation'])
                : null,
            maskPosition: ($data['mask_position'] ?? null) !== null
                ? $this->denormalizeMaskPosition($data['mask_position'])
                : null,
            customEmojiId: $data['custom_emoji_id'] ?? null,
            needsRepainting: $data['needs_repainting'] ?? null,
            fileSize: $data['file_size'] ?? null,
        );
    }

    public function denormalizeStickerSet(array $data): StickerSet
    {
        $requiredFields = [
            'name',
            'title',
            'sticker_type',
            'is_animated',
            'is_video',
            'stickers',
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

        return new StickerSet(
            name: $data['name'],
            title: $data['title'],
            stickerType: $data['sticker_type'],
            isAnimated: $data['is_animated'],
            isVideo: $data['is_video'],
            stickers: $data['stickers'],
            thumbnail: ($data['thumbnail'] ?? null) !== null
                ? $this->denormalizePhotoSize($data['thumbnail'])
                : null,
        );
    }

    public function denormalizeMaskPosition(array $data): MaskPosition
    {
        $requiredFields = [
            'point',
            'x_shift',
            'y_shift',
            'scale',
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

        return new MaskPosition(
            point: $data['point'],
            xShift: $data['x_shift'],
            yShift: $data['y_shift'],
            scale: $data['scale'],
        );
    }

    public function denormalizeInputSticker(array $data): InputSticker
    {
        $requiredFields = [
            'sticker',
            'emoji_list',
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

        return new InputSticker(
            sticker: $this->denormalizeInputFile | string($data['sticker']),
            emojiList: $data['emoji_list'],
            maskPosition: ($data['mask_position'] ?? null) !== null
                ? $this->denormalizeMaskPosition($data['mask_position'])
                : null,
            keywords: $data['keywords'] ?? null,
        );
    }

    public function denormalizeInlineQuery(array $data): InlineQuery
    {
        $requiredFields = [
            'id',
            'from',
            'query',
            'offset',
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

        return new InlineQuery(
            id: $data['id'],
            from: $this->denormalizeUser($data['from']),
            query: $data['query'],
            offset: $data['offset'],
            chatType: $data['chat_type'] ?? null,
            location: ($data['location'] ?? null) !== null
                ? $this->denormalizeLocation($data['location'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultsButton(array $data): InlineQueryResultsButton
    {
        $requiredFields = [
            'text',
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

        return new InlineQueryResultsButton(
            text: $data['text'],
            webApp: ($data['web_app'] ?? null) !== null
                ? $this->denormalizeWebAppInfo($data['web_app'])
                : null,
            startParameter: $data['start_parameter'] ?? null,
        );
    }

    public function denormalizeInlineQueryResult(array $data): Types\InlineQueryResult
    {
        return new InlineQueryResult();
    }

    public function denormalizeInlineQueryResultArticle(array $data): InlineQueryResultArticle
    {
        $requiredFields = [
            'id',
            'title',
            'input_message_content',
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

        return new InlineQueryResultArticle(
            id: $data['id'],
            title: $data['title'],
            inputMessageContent: $this->denormalizeInputMessageContent($data['input_message_content']),
            type: $data['type'] ?? 'article',
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            url: $data['url'] ?? null,
            hideUrl: $data['hide_url'] ?? null,
            description: $data['description'] ?? null,
            thumbnailUrl: $data['thumbnail_url'] ?? null,
            thumbnailWidth: $data['thumbnail_width'] ?? null,
            thumbnailHeight: $data['thumbnail_height'] ?? null,
        );
    }

    public function denormalizeInlineQueryResultPhoto(array $data): InlineQueryResultPhoto
    {
        $requiredFields = [
            'id',
            'photo_url',
            'thumbnail_url',
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

        return new InlineQueryResultPhoto(
            id: $data['id'],
            photoUrl: $data['photo_url'],
            thumbnailUrl: $data['thumbnail_url'],
            type: $data['type'] ?? 'photo',
            photoWidth: $data['photo_width'] ?? null,
            photoHeight: $data['photo_height'] ?? null,
            title: $data['title'] ?? null,
            description: $data['description'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultGif(array $data): InlineQueryResultGif
    {
        $requiredFields = [
            'id',
            'gif_url',
            'thumbnail_url',
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

        return new InlineQueryResultGif(
            id: $data['id'],
            gifUrl: $data['gif_url'],
            thumbnailUrl: $data['thumbnail_url'],
            type: $data['type'] ?? 'gif',
            gifWidth: $data['gif_width'] ?? null,
            gifHeight: $data['gif_height'] ?? null,
            gifDuration: $data['gif_duration'] ?? null,
            thumbnailMimeType: $data['thumbnail_mime_type'] ?? null,
            title: $data['title'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultMpeg4Gif(array $data): InlineQueryResultMpeg4Gif
    {
        $requiredFields = [
            'id',
            'mpeg4_url',
            'thumbnail_url',
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

        return new InlineQueryResultMpeg4Gif(
            id: $data['id'],
            mpeg4Url: $data['mpeg4_url'],
            thumbnailUrl: $data['thumbnail_url'],
            type: $data['type'] ?? 'mpeg4_gif',
            mpeg4Width: $data['mpeg4_width'] ?? null,
            mpeg4Height: $data['mpeg4_height'] ?? null,
            mpeg4Duration: $data['mpeg4_duration'] ?? null,
            thumbnailMimeType: $data['thumbnail_mime_type'] ?? null,
            title: $data['title'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultVideo(array $data): InlineQueryResultVideo
    {
        $requiredFields = [
            'id',
            'video_url',
            'mime_type',
            'thumbnail_url',
            'title',
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

        return new InlineQueryResultVideo(
            id: $data['id'],
            videoUrl: $data['video_url'],
            mimeType: $data['mime_type'],
            thumbnailUrl: $data['thumbnail_url'],
            title: $data['title'],
            type: $data['type'] ?? 'video',
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            videoWidth: $data['video_width'] ?? null,
            videoHeight: $data['video_height'] ?? null,
            videoDuration: $data['video_duration'] ?? null,
            description: $data['description'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultAudio(array $data): InlineQueryResultAudio
    {
        $requiredFields = [
            'id',
            'audio_url',
            'title',
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

        return new InlineQueryResultAudio(
            id: $data['id'],
            audioUrl: $data['audio_url'],
            title: $data['title'],
            type: $data['type'] ?? 'audio',
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            performer: $data['performer'] ?? null,
            audioDuration: $data['audio_duration'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultVoice(array $data): InlineQueryResultVoice
    {
        $requiredFields = [
            'id',
            'voice_url',
            'title',
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

        return new InlineQueryResultVoice(
            id: $data['id'],
            voiceUrl: $data['voice_url'],
            title: $data['title'],
            type: $data['type'] ?? 'voice',
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            voiceDuration: $data['voice_duration'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultDocument(array $data): InlineQueryResultDocument
    {
        $requiredFields = [
            'id',
            'title',
            'document_url',
            'mime_type',
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

        return new InlineQueryResultDocument(
            id: $data['id'],
            title: $data['title'],
            documentUrl: $data['document_url'],
            mimeType: $data['mime_type'],
            type: $data['type'] ?? 'document',
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            description: $data['description'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
            thumbnailUrl: $data['thumbnail_url'] ?? null,
            thumbnailWidth: $data['thumbnail_width'] ?? null,
            thumbnailHeight: $data['thumbnail_height'] ?? null,
        );
    }

    public function denormalizeInlineQueryResultLocation(array $data): InlineQueryResultLocation
    {
        $requiredFields = [
            'id',
            'latitude',
            'longitude',
            'title',
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

        return new InlineQueryResultLocation(
            id: $data['id'],
            latitude: $data['latitude'],
            longitude: $data['longitude'],
            title: $data['title'],
            type: $data['type'] ?? 'location',
            horizontalAccuracy: $data['horizontal_accuracy'] ?? null,
            livePeriod: $data['live_period'] ?? null,
            heading: $data['heading'] ?? null,
            proximityAlertRadius: $data['proximity_alert_radius'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
            thumbnailUrl: $data['thumbnail_url'] ?? null,
            thumbnailWidth: $data['thumbnail_width'] ?? null,
            thumbnailHeight: $data['thumbnail_height'] ?? null,
        );
    }

    public function denormalizeInlineQueryResultVenue(array $data): InlineQueryResultVenue
    {
        $requiredFields = [
            'id',
            'latitude',
            'longitude',
            'title',
            'address',
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

        return new InlineQueryResultVenue(
            id: $data['id'],
            latitude: $data['latitude'],
            longitude: $data['longitude'],
            title: $data['title'],
            address: $data['address'],
            type: $data['type'] ?? 'venue',
            foursquareId: $data['foursquare_id'] ?? null,
            foursquareType: $data['foursquare_type'] ?? null,
            googlePlaceId: $data['google_place_id'] ?? null,
            googlePlaceType: $data['google_place_type'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
            thumbnailUrl: $data['thumbnail_url'] ?? null,
            thumbnailWidth: $data['thumbnail_width'] ?? null,
            thumbnailHeight: $data['thumbnail_height'] ?? null,
        );
    }

    public function denormalizeInlineQueryResultContact(array $data): InlineQueryResultContact
    {
        $requiredFields = [
            'id',
            'phone_number',
            'first_name',
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

        return new InlineQueryResultContact(
            id: $data['id'],
            phoneNumber: $data['phone_number'],
            firstName: $data['first_name'],
            type: $data['type'] ?? 'contact',
            lastName: $data['last_name'] ?? null,
            vcard: $data['vcard'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
            thumbnailUrl: $data['thumbnail_url'] ?? null,
            thumbnailWidth: $data['thumbnail_width'] ?? null,
            thumbnailHeight: $data['thumbnail_height'] ?? null,
        );
    }

    public function denormalizeInlineQueryResultGame(array $data): InlineQueryResultGame
    {
        $requiredFields = [
            'id',
            'game_short_name',
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

        return new InlineQueryResultGame(
            id: $data['id'],
            gameShortName: $data['game_short_name'],
            type: $data['type'] ?? 'game',
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultCachedPhoto(array $data): InlineQueryResultCachedPhoto
    {
        $requiredFields = [
            'id',
            'photo_file_id',
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

        return new InlineQueryResultCachedPhoto(
            id: $data['id'],
            photoFileId: $data['photo_file_id'],
            type: $data['type'] ?? 'photo',
            title: $data['title'] ?? null,
            description: $data['description'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultCachedGif(array $data): InlineQueryResultCachedGif
    {
        $requiredFields = [
            'id',
            'gif_file_id',
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

        return new InlineQueryResultCachedGif(
            id: $data['id'],
            gifFileId: $data['gif_file_id'],
            type: $data['type'] ?? 'gif',
            title: $data['title'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultCachedMpeg4Gif(array $data): InlineQueryResultCachedMpeg4Gif
    {
        $requiredFields = [
            'id',
            'mpeg4_file_id',
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

        return new InlineQueryResultCachedMpeg4Gif(
            id: $data['id'],
            mpeg4FileId: $data['mpeg4_file_id'],
            type: $data['type'] ?? 'mpeg4_gif',
            title: $data['title'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultCachedSticker(array $data): InlineQueryResultCachedSticker
    {
        $requiredFields = [
            'id',
            'sticker_file_id',
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

        return new InlineQueryResultCachedSticker(
            id: $data['id'],
            stickerFileId: $data['sticker_file_id'],
            type: $data['type'] ?? 'sticker',
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultCachedDocument(array $data): InlineQueryResultCachedDocument
    {
        $requiredFields = [
            'id',
            'title',
            'document_file_id',
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

        return new InlineQueryResultCachedDocument(
            id: $data['id'],
            title: $data['title'],
            documentFileId: $data['document_file_id'],
            type: $data['type'] ?? 'document',
            description: $data['description'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultCachedVideo(array $data): InlineQueryResultCachedVideo
    {
        $requiredFields = [
            'id',
            'video_file_id',
            'title',
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

        return new InlineQueryResultCachedVideo(
            id: $data['id'],
            videoFileId: $data['video_file_id'],
            title: $data['title'],
            type: $data['type'] ?? 'video',
            description: $data['description'] ?? null,
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultCachedVoice(array $data): InlineQueryResultCachedVoice
    {
        $requiredFields = [
            'id',
            'voice_file_id',
            'title',
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

        return new InlineQueryResultCachedVoice(
            id: $data['id'],
            voiceFileId: $data['voice_file_id'],
            title: $data['title'],
            type: $data['type'] ?? 'voice',
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInlineQueryResultCachedAudio(array $data): InlineQueryResultCachedAudio
    {
        $requiredFields = [
            'id',
            'audio_file_id',
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

        return new InlineQueryResultCachedAudio(
            id: $data['id'],
            audioFileId: $data['audio_file_id'],
            type: $data['type'] ?? 'audio',
            caption: $data['caption'] ?? null,
            parseMode: $data['parse_mode'] ?? null,
            captionEntities: $data['caption_entities'] ?? null,
            replyMarkup: ($data['reply_markup'] ?? null) !== null
                ? $this->denormalizeInlineKeyboardMarkup($data['reply_markup'])
                : null,
            inputMessageContent: ($data['input_message_content'] ?? null) !== null
                ? $this->denormalizeInputMessageContent($data['input_message_content'])
                : null,
        );
    }

    public function denormalizeInputMessageContent(array $data): Types\InputMessageContent
    {
        return new InputMessageContent();
    }

    public function denormalizeInputTextMessageContent(array $data): InputTextMessageContent
    {
        $requiredFields = [
            'message_text',
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

        return new InputTextMessageContent(
            messageText: $data['message_text'],
            parseMode: $data['parse_mode'] ?? null,
            entities: $data['entities'] ?? null,
            disableWebPagePreview: $data['disable_web_page_preview'] ?? null,
        );
    }

    public function denormalizeInputLocationMessageContent(array $data): InputLocationMessageContent
    {
        $requiredFields = [
            'latitude',
            'longitude',
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

        return new InputLocationMessageContent(
            latitude: $data['latitude'],
            longitude: $data['longitude'],
            horizontalAccuracy: $data['horizontal_accuracy'] ?? null,
            livePeriod: $data['live_period'] ?? null,
            heading: $data['heading'] ?? null,
            proximityAlertRadius: $data['proximity_alert_radius'] ?? null,
        );
    }

    public function denormalizeInputVenueMessageContent(array $data): InputVenueMessageContent
    {
        $requiredFields = [
            'latitude',
            'longitude',
            'title',
            'address',
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

        return new InputVenueMessageContent(
            latitude: $data['latitude'],
            longitude: $data['longitude'],
            title: $data['title'],
            address: $data['address'],
            foursquareId: $data['foursquare_id'] ?? null,
            foursquareType: $data['foursquare_type'] ?? null,
            googlePlaceId: $data['google_place_id'] ?? null,
            googlePlaceType: $data['google_place_type'] ?? null,
        );
    }

    public function denormalizeInputContactMessageContent(array $data): InputContactMessageContent
    {
        $requiredFields = [
            'phone_number',
            'first_name',
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

        return new InputContactMessageContent(
            phoneNumber: $data['phone_number'],
            firstName: $data['first_name'],
            lastName: $data['last_name'] ?? null,
            vcard: $data['vcard'] ?? null,
        );
    }

    public function denormalizeInputInvoiceMessageContent(array $data): InputInvoiceMessageContent
    {
        $requiredFields = [
            'title',
            'description',
            'payload',
            'provider_token',
            'currency',
            'prices',
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

        return new InputInvoiceMessageContent(
            title: $data['title'],
            description: $data['description'],
            payload: $data['payload'],
            providerToken: $data['provider_token'],
            currency: $data['currency'],
            prices: $data['prices'],
            maxTipAmount: $data['max_tip_amount'] ?? null,
            suggestedTipAmounts: $data['suggested_tip_amounts'] ?? null,
            providerData: $data['provider_data'] ?? null,
            photoUrl: $data['photo_url'] ?? null,
            photoSize: $data['photo_size'] ?? null,
            photoWidth: $data['photo_width'] ?? null,
            photoHeight: $data['photo_height'] ?? null,
            needName: $data['need_name'] ?? null,
            needPhoneNumber: $data['need_phone_number'] ?? null,
            needEmail: $data['need_email'] ?? null,
            needShippingAddress: $data['need_shipping_address'] ?? null,
            sendPhoneNumberToProvider: $data['send_phone_number_to_provider'] ?? null,
            sendEmailToProvider: $data['send_email_to_provider'] ?? null,
            isFlexible: $data['is_flexible'] ?? null,
        );
    }

    public function denormalizeChosenInlineResult(array $data): ChosenInlineResult
    {
        $requiredFields = [
            'result_id',
            'from',
            'query',
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

        return new ChosenInlineResult(
            resultId: $data['result_id'],
            from: $this->denormalizeUser($data['from']),
            query: $data['query'],
            location: ($data['location'] ?? null) !== null
                ? $this->denormalizeLocation($data['location'])
                : null,
            inlineMessageId: $data['inline_message_id'] ?? null,
        );
    }

    public function denormalizeSentWebAppMessage(array $data): SentWebAppMessage
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

        return new SentWebAppMessage(
            inlineMessageId: $data['inline_message_id'] ?? null,
        );
    }

    public function denormalizeLabeledPrice(array $data): LabeledPrice
    {
        $requiredFields = [
            'label',
            'amount',
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

        return new LabeledPrice(
            label: $data['label'],
            amount: $data['amount'],
        );
    }

    public function denormalizeInvoice(array $data): Invoice
    {
        $requiredFields = [
            'title',
            'description',
            'start_parameter',
            'currency',
            'total_amount',
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

        return new Invoice(
            title: $data['title'],
            description: $data['description'],
            startParameter: $data['start_parameter'],
            currency: $data['currency'],
            totalAmount: $data['total_amount'],
        );
    }

    public function denormalizeShippingAddress(array $data): ShippingAddress
    {
        $requiredFields = [
            'country_code',
            'state',
            'city',
            'street_line1',
            'street_line2',
            'post_code',
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

        return new ShippingAddress(
            countryCode: $data['country_code'],
            state: $data['state'],
            city: $data['city'],
            streetLine1: $data['street_line1'],
            streetLine2: $data['street_line2'],
            postCode: $data['post_code'],
        );
    }

    public function denormalizeOrderInfo(array $data): OrderInfo
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

        return new OrderInfo(
            name: $data['name'] ?? null,
            phoneNumber: $data['phone_number'] ?? null,
            email: $data['email'] ?? null,
            shippingAddress: ($data['shipping_address'] ?? null) !== null
                ? $this->denormalizeShippingAddress($data['shipping_address'])
                : null,
        );
    }

    public function denormalizeShippingOption(array $data): ShippingOption
    {
        $requiredFields = [
            'id',
            'title',
            'prices',
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

        return new ShippingOption(
            id: $data['id'],
            title: $data['title'],
            prices: $data['prices'],
        );
    }

    public function denormalizeSuccessfulPayment(array $data): SuccessfulPayment
    {
        $requiredFields = [
            'currency',
            'total_amount',
            'invoice_payload',
            'telegram_payment_charge_id',
            'provider_payment_charge_id',
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

        return new SuccessfulPayment(
            currency: $data['currency'],
            totalAmount: $data['total_amount'],
            invoicePayload: $data['invoice_payload'],
            telegramPaymentChargeId: $data['telegram_payment_charge_id'],
            providerPaymentChargeId: $data['provider_payment_charge_id'],
            shippingOptionId: $data['shipping_option_id'] ?? null,
            orderInfo: ($data['order_info'] ?? null) !== null
                ? $this->denormalizeOrderInfo($data['order_info'])
                : null,
        );
    }

    public function denormalizeShippingQuery(array $data): ShippingQuery
    {
        $requiredFields = [
            'id',
            'from',
            'invoice_payload',
            'shipping_address',
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

        return new ShippingQuery(
            id: $data['id'],
            from: $this->denormalizeUser($data['from']),
            invoicePayload: $data['invoice_payload'],
            shippingAddress: $this->denormalizeShippingAddress($data['shipping_address']),
        );
    }

    public function denormalizePreCheckoutQuery(array $data): PreCheckoutQuery
    {
        $requiredFields = [
            'id',
            'from',
            'currency',
            'total_amount',
            'invoice_payload',
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

        return new PreCheckoutQuery(
            id: $data['id'],
            from: $this->denormalizeUser($data['from']),
            currency: $data['currency'],
            totalAmount: $data['total_amount'],
            invoicePayload: $data['invoice_payload'],
            shippingOptionId: $data['shipping_option_id'] ?? null,
            orderInfo: ($data['order_info'] ?? null) !== null
                ? $this->denormalizeOrderInfo($data['order_info'])
                : null,
        );
    }

    public function denormalizePassportData(array $data): PassportData
    {
        $requiredFields = [
            'data',
            'credentials',
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

        return new PassportData(
            data: $data['data'],
            credentials: $this->denormalizeEncryptedCredentials($data['credentials']),
        );
    }

    public function denormalizePassportFile(array $data): PassportFile
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'file_size',
            'file_date',
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

        return new PassportFile(
            fileId: $data['file_id'],
            fileUniqueId: $data['file_unique_id'],
            fileSize: $data['file_size'],
            fileDate: $data['file_date'],
        );
    }

    public function denormalizeEncryptedPassportElement(array $data): EncryptedPassportElement
    {
        $requiredFields = [
            'type',
            'hash',
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

        return new EncryptedPassportElement(
            type: $data['type'],
            hash: $data['hash'],
            data: $data['data'] ?? null,
            phoneNumber: $data['phone_number'] ?? null,
            email: $data['email'] ?? null,
            files: $data['files'] ?? null,
            frontSide: ($data['front_side'] ?? null) !== null
                ? $this->denormalizePassportFile($data['front_side'])
                : null,
            reverseSide: ($data['reverse_side'] ?? null) !== null
                ? $this->denormalizePassportFile($data['reverse_side'])
                : null,
            selfie: ($data['selfie'] ?? null) !== null
                ? $this->denormalizePassportFile($data['selfie'])
                : null,
            translation: $data['translation'] ?? null,
        );
    }

    public function denormalizeEncryptedCredentials(array $data): EncryptedCredentials
    {
        $requiredFields = [
            'data',
            'hash',
            'secret',
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

        return new EncryptedCredentials(
            data: $data['data'],
            hash: $data['hash'],
            secret: $data['secret'],
        );
    }

    public function denormalizePassportElementError(array $data): Types\PassportElementError
    {
        return new PassportElementError();
    }

    public function denormalizePassportElementErrorDataField(array $data): PassportElementErrorDataField
    {
        $requiredFields = [
            'type',
            'field_name',
            'data_hash',
            'message',
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

        return new PassportElementErrorDataField(
            type: $data['type'],
            fieldName: $data['field_name'],
            dataHash: $data['data_hash'],
            message: $data['message'],
            source: $data['source'] ?? 'data',
        );
    }

    public function denormalizePassportElementErrorFrontSide(array $data): PassportElementErrorFrontSide
    {
        $requiredFields = [
            'type',
            'file_hash',
            'message',
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

        return new PassportElementErrorFrontSide(
            type: $data['type'],
            fileHash: $data['file_hash'],
            message: $data['message'],
            source: $data['source'] ?? 'front_side',
        );
    }

    public function denormalizePassportElementErrorReverseSide(array $data): PassportElementErrorReverseSide
    {
        $requiredFields = [
            'type',
            'file_hash',
            'message',
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

        return new PassportElementErrorReverseSide(
            type: $data['type'],
            fileHash: $data['file_hash'],
            message: $data['message'],
            source: $data['source'] ?? 'reverse_side',
        );
    }

    public function denormalizePassportElementErrorSelfie(array $data): PassportElementErrorSelfie
    {
        $requiredFields = [
            'type',
            'file_hash',
            'message',
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

        return new PassportElementErrorSelfie(
            type: $data['type'],
            fileHash: $data['file_hash'],
            message: $data['message'],
            source: $data['source'] ?? 'selfie',
        );
    }

    public function denormalizePassportElementErrorFile(array $data): PassportElementErrorFile
    {
        $requiredFields = [
            'type',
            'file_hash',
            'message',
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

        return new PassportElementErrorFile(
            type: $data['type'],
            fileHash: $data['file_hash'],
            message: $data['message'],
            source: $data['source'] ?? 'file',
        );
    }

    public function denormalizePassportElementErrorFiles(array $data): PassportElementErrorFiles
    {
        $requiredFields = [
            'type',
            'file_hashes',
            'message',
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

        return new PassportElementErrorFiles(
            type: $data['type'],
            fileHashes: $data['file_hashes'],
            message: $data['message'],
            source: $data['source'] ?? 'files',
        );
    }

    public function denormalizePassportElementErrorTranslationFile(array $data): PassportElementErrorTranslationFile
    {
        $requiredFields = [
            'type',
            'file_hash',
            'message',
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

        return new PassportElementErrorTranslationFile(
            type: $data['type'],
            fileHash: $data['file_hash'],
            message: $data['message'],
            source: $data['source'] ?? 'translation_file',
        );
    }

    public function denormalizePassportElementErrorTranslationFiles(array $data): PassportElementErrorTranslationFiles
    {
        $requiredFields = [
            'type',
            'file_hashes',
            'message',
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

        return new PassportElementErrorTranslationFiles(
            type: $data['type'],
            fileHashes: $data['file_hashes'],
            message: $data['message'],
            source: $data['source'] ?? 'translation_files',
        );
    }

    public function denormalizePassportElementErrorUnspecified(array $data): PassportElementErrorUnspecified
    {
        $requiredFields = [
            'type',
            'element_hash',
            'message',
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

        return new PassportElementErrorUnspecified(
            type: $data['type'],
            elementHash: $data['element_hash'],
            message: $data['message'],
            source: $data['source'] ?? 'unspecified',
        );
    }

    public function denormalizeGame(array $data): Game
    {
        $requiredFields = [
            'title',
            'description',
            'photo',
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

        return new Game(
            title: $data['title'],
            description: $data['description'],
            photo: $data['photo'],
            text: $data['text'] ?? null,
            textEntities: $data['text_entities'] ?? null,
            animation: ($data['animation'] ?? null) !== null
                ? $this->denormalizeAnimation($data['animation'])
                : null,
        );
    }

    public function denormalizeCallbackGame(array $data): CallbackGame
    {
        return new CallbackGame();
    }

    public function denormalizeGameHighScore(array $data): GameHighScore
    {
        $requiredFields = [
            'position',
            'user',
            'score',
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

        return new GameHighScore(
            position: $data['position'],
            user: $this->denormalizeUser($data['user']),
            score: $data['score'],
        );
    }

    public function serialize(array $data): string
    {
        return json_encode($this->normalize($data));
    }

    public function deserialize(string $data, array $types): mixed
    {
        $response = json_decode($data, true);
    }

    private function denormalizeType(array $data, string $type): TypeInterface
    {
        return match ($type) {
            Update::class => $this->denormalizeUpdate($data),
            WebhookInfo::class => $this->denormalizeWebhookInfo($data),
            User::class => $this->denormalizeUser($data),
            Chat::class => $this->denormalizeChat($data),
            Message::class => $this->denormalizeMessage($data),
            MessageId::class => $this->denormalizeMessageId($data),
            MessageEntity::class => $this->denormalizeMessageEntity($data),
            PhotoSize::class => $this->denormalizePhotoSize($data),
            Animation::class => $this->denormalizeAnimation($data),
            Audio::class => $this->denormalizeAudio($data),
            Document::class => $this->denormalizeDocument($data),
            Story::class => $this->denormalizeStory($data),
            Video::class => $this->denormalizeVideo($data),
            VideoNote::class => $this->denormalizeVideoNote($data),
            Voice::class => $this->denormalizeVoice($data),
            Contact::class => $this->denormalizeContact($data),
            Dice::class => $this->denormalizeDice($data),
            PollOption::class => $this->denormalizePollOption($data),
            PollAnswer::class => $this->denormalizePollAnswer($data),
            Poll::class => $this->denormalizePoll($data),
            Location::class => $this->denormalizeLocation($data),
            Venue::class => $this->denormalizeVenue($data),
            WebAppData::class => $this->denormalizeWebAppData($data),
            ProximityAlertTriggered::class => $this->denormalizeProximityAlertTriggered($data),
            MessageAutoDeleteTimerChanged::class => $this->denormalizeMessageAutoDeleteTimerChanged($data),
            ForumTopicCreated::class => $this->denormalizeForumTopicCreated($data),
            ForumTopicClosed::class => $this->denormalizeForumTopicClosed($data),
            ForumTopicEdited::class => $this->denormalizeForumTopicEdited($data),
            ForumTopicReopened::class => $this->denormalizeForumTopicReopened($data),
            GeneralForumTopicHidden::class => $this->denormalizeGeneralForumTopicHidden($data),
            GeneralForumTopicUnhidden::class => $this->denormalizeGeneralForumTopicUnhidden($data),
            UserShared::class => $this->denormalizeUserShared($data),
            ChatShared::class => $this->denormalizeChatShared($data),
            WriteAccessAllowed::class => $this->denormalizeWriteAccessAllowed($data),
            VideoChatScheduled::class => $this->denormalizeVideoChatScheduled($data),
            VideoChatStarted::class => $this->denormalizeVideoChatStarted($data),
            VideoChatEnded::class => $this->denormalizeVideoChatEnded($data),
            VideoChatParticipantsInvited::class => $this->denormalizeVideoChatParticipantsInvited($data),
            UserProfilePhotos::class => $this->denormalizeUserProfilePhotos($data),
            File::class => $this->denormalizeFile($data),
            WebAppInfo::class => $this->denormalizeWebAppInfo($data),
            ReplyKeyboardMarkup::class => $this->denormalizeReplyKeyboardMarkup($data),
            KeyboardButton::class => $this->denormalizeKeyboardButton($data),
            KeyboardButtonRequestUser::class => $this->denormalizeKeyboardButtonRequestUser($data),
            KeyboardButtonRequestChat::class => $this->denormalizeKeyboardButtonRequestChat($data),
            KeyboardButtonPollType::class => $this->denormalizeKeyboardButtonPollType($data),
            ReplyKeyboardRemove::class => $this->denormalizeReplyKeyboardRemove($data),
            InlineKeyboardMarkup::class => $this->denormalizeInlineKeyboardMarkup($data),
            InlineKeyboardButton::class => $this->denormalizeInlineKeyboardButton($data),
            LoginUrl::class => $this->denormalizeLoginUrl($data),
            SwitchInlineQueryChosenChat::class => $this->denormalizeSwitchInlineQueryChosenChat($data),
            CallbackQuery::class => $this->denormalizeCallbackQuery($data),
            ForceReply::class => $this->denormalizeForceReply($data),
            ChatPhoto::class => $this->denormalizeChatPhoto($data),
            ChatInviteLink::class => $this->denormalizeChatInviteLink($data),
            ChatAdministratorRights::class => $this->denormalizeChatAdministratorRights($data),
            ChatMemberOwner::class => $this->denormalizeChatMemberOwner($data),
            ChatMemberAdministrator::class => $this->denormalizeChatMemberAdministrator($data),
            ChatMemberMember::class => $this->denormalizeChatMemberMember($data),
            ChatMemberRestricted::class => $this->denormalizeChatMemberRestricted($data),
            ChatMemberLeft::class => $this->denormalizeChatMemberLeft($data),
            ChatMemberBanned::class => $this->denormalizeChatMemberBanned($data),
            ChatMemberUpdated::class => $this->denormalizeChatMemberUpdated($data),
            ChatJoinRequest::class => $this->denormalizeChatJoinRequest($data),
            ChatPermissions::class => $this->denormalizeChatPermissions($data),
            ChatLocation::class => $this->denormalizeChatLocation($data),
            ForumTopic::class => $this->denormalizeForumTopic($data),
            BotCommand::class => $this->denormalizeBotCommand($data),
            BotCommandScopeDefault::class => $this->denormalizeBotCommandScopeDefault($data),
            BotCommandScopeAllPrivateChats::class => $this->denormalizeBotCommandScopeAllPrivateChats($data),
            BotCommandScopeAllGroupChats::class => $this->denormalizeBotCommandScopeAllGroupChats($data),
            BotCommandScopeAllChatAdministrators::class => $this->denormalizeBotCommandScopeAllChatAdministrators($data),
            BotCommandScopeChat::class => $this->denormalizeBotCommandScopeChat($data),
            BotCommandScopeChatAdministrators::class => $this->denormalizeBotCommandScopeChatAdministrators($data),
            BotCommandScopeChatMember::class => $this->denormalizeBotCommandScopeChatMember($data),
            BotName::class => $this->denormalizeBotName($data),
            BotDescription::class => $this->denormalizeBotDescription($data),
            BotShortDescription::class => $this->denormalizeBotShortDescription($data),
            MenuButtonCommands::class => $this->denormalizeMenuButtonCommands($data),
            MenuButtonWebApp::class => $this->denormalizeMenuButtonWebApp($data),
            MenuButtonDefault::class => $this->denormalizeMenuButtonDefault($data),
            ResponseParameters::class => $this->denormalizeResponseParameters($data),
            InputMediaPhoto::class => $this->denormalizeInputMediaPhoto($data),
            InputMediaVideo::class => $this->denormalizeInputMediaVideo($data),
            InputMediaAnimation::class => $this->denormalizeInputMediaAnimation($data),
            InputMediaAudio::class => $this->denormalizeInputMediaAudio($data),
            InputMediaDocument::class => $this->denormalizeInputMediaDocument($data),
            InputFile::class => $this->denormalizeInputFile($data),
            Sticker::class => $this->denormalizeSticker($data),
            StickerSet::class => $this->denormalizeStickerSet($data),
            MaskPosition::class => $this->denormalizeMaskPosition($data),
            InputSticker::class => $this->denormalizeInputSticker($data),
            InlineQuery::class => $this->denormalizeInlineQuery($data),
            InlineQueryResultsButton::class => $this->denormalizeInlineQueryResultsButton($data),
            InlineQueryResultArticle::class => $this->denormalizeInlineQueryResultArticle($data),
            InlineQueryResultPhoto::class => $this->denormalizeInlineQueryResultPhoto($data),
            InlineQueryResultGif::class => $this->denormalizeInlineQueryResultGif($data),
            InlineQueryResultMpeg4Gif::class => $this->denormalizeInlineQueryResultMpeg4Gif($data),
            InlineQueryResultVideo::class => $this->denormalizeInlineQueryResultVideo($data),
            InlineQueryResultAudio::class => $this->denormalizeInlineQueryResultAudio($data),
            InlineQueryResultVoice::class => $this->denormalizeInlineQueryResultVoice($data),
            InlineQueryResultDocument::class => $this->denormalizeInlineQueryResultDocument($data),
            InlineQueryResultLocation::class => $this->denormalizeInlineQueryResultLocation($data),
            InlineQueryResultVenue::class => $this->denormalizeInlineQueryResultVenue($data),
            InlineQueryResultContact::class => $this->denormalizeInlineQueryResultContact($data),
            InlineQueryResultGame::class => $this->denormalizeInlineQueryResultGame($data),
            InlineQueryResultCachedPhoto::class => $this->denormalizeInlineQueryResultCachedPhoto($data),
            InlineQueryResultCachedGif::class => $this->denormalizeInlineQueryResultCachedGif($data),
            InlineQueryResultCachedMpeg4Gif::class => $this->denormalizeInlineQueryResultCachedMpeg4Gif($data),
            InlineQueryResultCachedSticker::class => $this->denormalizeInlineQueryResultCachedSticker($data),
            InlineQueryResultCachedDocument::class => $this->denormalizeInlineQueryResultCachedDocument($data),
            InlineQueryResultCachedVideo::class => $this->denormalizeInlineQueryResultCachedVideo($data),
            InlineQueryResultCachedVoice::class => $this->denormalizeInlineQueryResultCachedVoice($data),
            InlineQueryResultCachedAudio::class => $this->denormalizeInlineQueryResultCachedAudio($data),
            InputTextMessageContent::class => $this->denormalizeInputTextMessageContent($data),
            InputLocationMessageContent::class => $this->denormalizeInputLocationMessageContent($data),
            InputVenueMessageContent::class => $this->denormalizeInputVenueMessageContent($data),
            InputContactMessageContent::class => $this->denormalizeInputContactMessageContent($data),
            InputInvoiceMessageContent::class => $this->denormalizeInputInvoiceMessageContent($data),
            ChosenInlineResult::class => $this->denormalizeChosenInlineResult($data),
            SentWebAppMessage::class => $this->denormalizeSentWebAppMessage($data),
            LabeledPrice::class => $this->denormalizeLabeledPrice($data),
            Invoice::class => $this->denormalizeInvoice($data),
            ShippingAddress::class => $this->denormalizeShippingAddress($data),
            OrderInfo::class => $this->denormalizeOrderInfo($data),
            ShippingOption::class => $this->denormalizeShippingOption($data),
            SuccessfulPayment::class => $this->denormalizeSuccessfulPayment($data),
            ShippingQuery::class => $this->denormalizeShippingQuery($data),
            PreCheckoutQuery::class => $this->denormalizePreCheckoutQuery($data),
            PassportData::class => $this->denormalizePassportData($data),
            PassportFile::class => $this->denormalizePassportFile($data),
            EncryptedPassportElement::class => $this->denormalizeEncryptedPassportElement($data),
            EncryptedCredentials::class => $this->denormalizeEncryptedCredentials($data),
            PassportElementErrorDataField::class => $this->denormalizePassportElementErrorDataField($data),
            PassportElementErrorFrontSide::class => $this->denormalizePassportElementErrorFrontSide($data),
            PassportElementErrorReverseSide::class => $this->denormalizePassportElementErrorReverseSide($data),
            PassportElementErrorSelfie::class => $this->denormalizePassportElementErrorSelfie($data),
            PassportElementErrorFile::class => $this->denormalizePassportElementErrorFile($data),
            PassportElementErrorFiles::class => $this->denormalizePassportElementErrorFiles($data),
            PassportElementErrorTranslationFile::class => $this->denormalizePassportElementErrorTranslationFile($data),
            PassportElementErrorTranslationFiles::class => $this->denormalizePassportElementErrorTranslationFiles($data),
            PassportElementErrorUnspecified::class => $this->denormalizePassportElementErrorUnspecified($data),
            Game::class => $this->denormalizeGame($data),
            CallbackGame::class => $this->denormalizeCallbackGame($data),
            GameHighScore::class => $this->denormalizeGameHighScore($data),
            default => throw new \InvalidArgumentException(sprintf('Unknown type %s', $type)),
        };
    }

    private function normalize(array $data): array
    {
        $result = [];
    }

    private function camelToSnake(string $input): string
    {
        return strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($input)));
    }
}