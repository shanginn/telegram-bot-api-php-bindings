<?php

namespace Shanginn\TelegramBotApiBindings;

use React\Promise\PromiseInterface;
use Shanginn\TelegramBotApiBindings\Types\BotCommand;
use Shanginn\TelegramBotApiBindings\Types\BotCommandScope;
use Shanginn\TelegramBotApiBindings\Types\BotDescription;
use Shanginn\TelegramBotApiBindings\Types\BotName;
use Shanginn\TelegramBotApiBindings\Types\BotShortDescription;
use Shanginn\TelegramBotApiBindings\Types\BusinessConnection;
use Shanginn\TelegramBotApiBindings\Types\ChatAdministratorRights;
use Shanginn\TelegramBotApiBindings\Types\ChatFullInfo;
use Shanginn\TelegramBotApiBindings\Types\ChatInviteLink;
use Shanginn\TelegramBotApiBindings\Types\ChatMember;
use Shanginn\TelegramBotApiBindings\Types\ChatPermissions;
use Shanginn\TelegramBotApiBindings\Types\File;
use Shanginn\TelegramBotApiBindings\Types\ForceReply;
use Shanginn\TelegramBotApiBindings\Types\ForumTopic;
use Shanginn\TelegramBotApiBindings\Types\GameHighScore;
use Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResult;
use Shanginn\TelegramBotApiBindings\Types\InlineQueryResultsButton;
use Shanginn\TelegramBotApiBindings\Types\InputFile;
use Shanginn\TelegramBotApiBindings\Types\InputMedia;
use Shanginn\TelegramBotApiBindings\Types\InputMediaAudio;
use Shanginn\TelegramBotApiBindings\Types\InputMediaDocument;
use Shanginn\TelegramBotApiBindings\Types\InputMediaPhoto;
use Shanginn\TelegramBotApiBindings\Types\InputMediaVideo;
use Shanginn\TelegramBotApiBindings\Types\InputPaidMedia;
use Shanginn\TelegramBotApiBindings\Types\InputPollOption;
use Shanginn\TelegramBotApiBindings\Types\InputSticker;
use Shanginn\TelegramBotApiBindings\Types\LabeledPrice;
use Shanginn\TelegramBotApiBindings\Types\LinkPreviewOptions;
use Shanginn\TelegramBotApiBindings\Types\MaskPosition;
use Shanginn\TelegramBotApiBindings\Types\MenuButton;
use Shanginn\TelegramBotApiBindings\Types\Message;
use Shanginn\TelegramBotApiBindings\Types\MessageEntity;
use Shanginn\TelegramBotApiBindings\Types\MessageId;
use Shanginn\TelegramBotApiBindings\Types\PassportElementError;
use Shanginn\TelegramBotApiBindings\Types\Poll;
use Shanginn\TelegramBotApiBindings\Types\ReactionType;
use Shanginn\TelegramBotApiBindings\Types\ReplyKeyboardMarkup;
use Shanginn\TelegramBotApiBindings\Types\ReplyKeyboardRemove;
use Shanginn\TelegramBotApiBindings\Types\ReplyParameters;
use Shanginn\TelegramBotApiBindings\Types\SentWebAppMessage;
use Shanginn\TelegramBotApiBindings\Types\ShippingOption;
use Shanginn\TelegramBotApiBindings\Types\StarTransactions;
use Shanginn\TelegramBotApiBindings\Types\Sticker;
use Shanginn\TelegramBotApiBindings\Types\StickerSet;
use Shanginn\TelegramBotApiBindings\Types\Update;
use Shanginn\TelegramBotApiBindings\Types\User;
use Shanginn\TelegramBotApiBindings\Types\UserChatBoosts;
use Shanginn\TelegramBotApiBindings\Types\UserProfilePhotos;
use Shanginn\TelegramBotApiBindings\Types\WebhookInfo;

class TelegramBotApi implements TelegramBotApiInterface
{
    public function __construct(
        protected TelegramBotApiClientInterface $client,
        protected TelegramBotApiSerializerInterface $serializer,
    ) {
    }

    private function doRequest(string $method, array $args, array $returnTypes): PromiseInterface
    {
        return $this->client
            ->sendRequest(
                $method,
                $this->serializer->serialize($args)
            )
            ->then(fn ($response) => $this->serializer->deserialize(
                $response,
                $returnTypes
            ));
    }

    /**
     * Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
     *
     * @param int|null           $offset         Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id. The negative offset can be specified to retrieve updates starting from -offset update from the end of the updates queue. All previous updates will be forgotten.
     * @param int|null           $limit          Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     * @param int|null           $timeout        Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling should be used for testing purposes only.
     * @param array<string>|null $allowedUpdates A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member, message_reaction, and message_reaction_count (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the getUpdates, so unwanted updates may be received for a short period of time.
     *
     * @return PromiseInterface<array<Update>>
     */
    public function getUpdates(
        int $offset = null,
        ?int $limit = 100,
        int $timeout = null,
        array $allowedUpdates = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["array<Shanginn\TelegramBotApiBindings\Types\Update>"]
        );
    }

    /**
     * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success.
     * If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter secret_token. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as content.
     *
     * @param string             $url                HTTPS URL to send updates to. Use an empty string to remove webhook integration
     * @param InputFile|null     $certificate        Upload your public key certificate so that the root certificate in use can be checked. See our self-signed guide for details.
     * @param string|null        $ipAddress          The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS
     * @param int|null           $maxConnections     The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput.
     * @param array<string>|null $allowedUpdates     A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See Update for a complete list of available update types. Specify an empty list to receive all update types except chat_member, message_reaction, and message_reaction_count (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect updates created before the call to the setWebhook, so unwanted updates may be received for a short period of time.
     * @param bool|null          $dropPendingUpdates Pass True to drop all pending updates
     * @param string|null        $secretToken        A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook request, 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed. The header is useful to ensure that the request comes from a webhook set by you.
     *
     * @return PromiseInterface<bool>
     */
    public function setWebhook(
        string $url,
        InputFile $certificate = null,
        string $ipAddress = null,
        ?int $maxConnections = 40,
        array $allowedUpdates = null,
        bool $dropPendingUpdates = null,
        string $secretToken = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success.
     *
     * @param bool|null $dropPendingUpdates Pass True to drop all pending updates
     *
     * @return PromiseInterface<bool>
     */
    public function deleteWebhook(bool $dropPendingUpdates = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
     *
     * @return PromiseInterface<WebhookInfo>
     */
    public function getWebhookInfo(): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\WebhookInfo"]
        );
    }

    /**
     * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a User object.
     *
     * @return PromiseInterface<User>
     */
    public function getMe(): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\User"]
        );
    }

    /**
     * Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
     *
     * @return PromiseInterface<bool>
     */
    public function logOut(): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
     *
     * @return PromiseInterface<bool>
     */
    public function close(): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to send text messages. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string                                                                       $text                 Text of the message to be sent, 1-4096 characters after entities parsing
     * @param string|null                                                                  $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $parseMode            Mode for parsing entities in the message text. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $entities             A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
     * @param LinkPreviewOptions|null                                                      $linkPreviewOptions   Link preview generation options for the message
     * @param bool|null                                                                    $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent       Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup          Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendMessage(
        int|string $chatId,
        string $text,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $parseMode = null,
        array $entities = null,
        LinkPreviewOptions $linkPreviewOptions = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to forward messages of any kind. Service messages and messages with protected content can't be forwarded. On success, the sent Message is returned.
     *
     * @param int|string $chatId              Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|string $fromChatId          Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
     * @param int        $messageId           Message identifier in the chat specified in from_chat_id
     * @param int|null   $messageThreadId     Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param bool|null  $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null  $protectContent      Protects the contents of the forwarded message from forwarding and saving
     *
     * @return PromiseInterface<Message>
     */
    public function forwardMessage(
        int|string $chatId,
        int|string $fromChatId,
        int $messageId,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to forward multiple messages of any kind. If some of the specified messages can't be found or forwarded, they are skipped. Service messages and messages with protected content can't be forwarded. Album grouping is kept for forwarded messages. On success, an array of MessageId of the sent messages is returned.
     *
     * @param int|string $chatId              Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|string $fromChatId          Unique identifier for the chat where the original messages were sent (or channel username in the format @channelusername)
     * @param array<int> $messageIds          A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to forward. The identifiers must be specified in a strictly increasing order.
     * @param int|null   $messageThreadId     Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param bool|null  $disableNotification Sends the messages silently. Users will receive a notification with no sound.
     * @param bool|null  $protectContent      Protects the contents of the forwarded messages from forwarding and saving
     *
     * @return PromiseInterface<array<MessageId>>
     */
    public function forwardMessages(
        int|string $chatId,
        int|string $fromChatId,
        array $messageIds,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["array<Shanginn\TelegramBotApiBindings\Types\MessageId>"]
        );
    }

    /**
     * Use this method to copy messages of any kind. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original message. Returns the MessageId of the sent message on success.
     *
     * @param int|string                                                                   $chatId                Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|string                                                                   $fromChatId            Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
     * @param int                                                                          $messageId             Message identifier in the chat specified in from_chat_id
     * @param int|null                                                                     $messageThreadId       Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $caption               New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is kept
     * @param string|null                                                                  $parseMode             Mode for parsing entities in the new caption. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $captionEntities       A JSON-serialized list of special entities that appear in the new caption, which can be specified instead of parse_mode
     * @param bool|null                                                                    $showCaptionAboveMedia Pass True, if the caption must be shown above the message media. Ignored if a new caption isn't specified.
     * @param bool|null                                                                    $disableNotification   Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent        Protects the contents of the sent message from forwarding and saving
     * @param ReplyParameters|null                                                         $replyParameters       Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup           Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<MessageId>
     */
    public function copyMessage(
        int|string $chatId,
        int|string $fromChatId,
        int $messageId,
        int $messageThreadId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\MessageId"]
        );
    }

    /**
     * Use this method to copy messages of any kind. If some of the specified messages can't be found or copied, they are skipped. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessages, but the copied messages don't have a link to the original message. Album grouping is kept for copied messages. On success, an array of MessageId of the sent messages is returned.
     *
     * @param int|string $chatId              Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|string $fromChatId          Unique identifier for the chat where the original messages were sent (or channel username in the format @channelusername)
     * @param array<int> $messageIds          A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to copy. The identifiers must be specified in a strictly increasing order.
     * @param int|null   $messageThreadId     Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param bool|null  $disableNotification Sends the messages silently. Users will receive a notification with no sound.
     * @param bool|null  $protectContent      Protects the contents of the sent messages from forwarding and saving
     * @param bool|null  $removeCaption       Pass True to copy the messages without their captions
     *
     * @return PromiseInterface<array<MessageId>>
     */
    public function copyMessages(
        int|string $chatId,
        int|string $fromChatId,
        array $messageIds,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        bool $removeCaption = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["array<Shanginn\TelegramBotApiBindings\Types\MessageId>"]
        );
    }

    /**
     * Use this method to send photos. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId                Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile|string                                                             $photo                 Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20. More information on Sending Files »
     * @param string|null                                                                  $businessConnectionId  Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId       Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $caption               Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing
     * @param string|null                                                                  $parseMode             Mode for parsing entities in the photo caption. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $captionEntities       A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|null                                                                    $showCaptionAboveMedia Pass True, if the caption must be shown above the message media
     * @param bool|null                                                                    $hasSpoiler            Pass True if the photo needs to be covered with a spoiler animation
     * @param bool|null                                                                    $disableNotification   Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent        Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId       Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters       Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup           Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendPhoto(
        int|string $chatId,
        InputFile|string $photo,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $hasSpoiler = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     * For sending voice messages, use the sendVoice method instead.
     *
     * @param int|string                                                                   $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile|string                                                             $audio                Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
     * @param string|null                                                                  $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $caption              Audio caption, 0-1024 characters after entities parsing
     * @param string|null                                                                  $parseMode            Mode for parsing entities in the audio caption. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $captionEntities      A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param int|null                                                                     $duration             Duration of the audio in seconds
     * @param string|null                                                                  $performer            Performer
     * @param string|null                                                                  $title                Track name
     * @param InputFile|string|null                                                        $thumbnail            Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param bool|null                                                                    $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent       Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup          Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendAudio(
        int|string $chatId,
        InputFile|string $audio,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        int $duration = null,
        string $performer = null,
        string $title = null,
        InputFile|string $thumbnail = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int|string                                                                   $chatId                      Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile|string                                                             $document                    File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
     * @param string|null                                                                  $businessConnectionId        Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId             Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputFile|string|null                                                        $thumbnail                   Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param string|null                                                                  $caption                     Document caption (may also be used when resending documents by file_id), 0-1024 characters after entities parsing
     * @param string|null                                                                  $parseMode                   Mode for parsing entities in the document caption. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $captionEntities             A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|null                                                                    $disableContentTypeDetection Disables automatic server-side content type detection for files uploaded using multipart/form-data
     * @param bool|null                                                                    $disableNotification         Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent              Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId             Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters             Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup                 Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendDocument(
        int|string $chatId,
        InputFile|string $document,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        InputFile|string $thumbnail = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $disableContentTypeDetection = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int|string                                                                   $chatId                Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile|string                                                             $video                 Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data. More information on Sending Files »
     * @param string|null                                                                  $businessConnectionId  Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId       Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param int|null                                                                     $duration              Duration of sent video in seconds
     * @param int|null                                                                     $width                 Video width
     * @param int|null                                                                     $height                Video height
     * @param InputFile|string|null                                                        $thumbnail             Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param string|null                                                                  $caption               Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities parsing
     * @param string|null                                                                  $parseMode             Mode for parsing entities in the video caption. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $captionEntities       A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|null                                                                    $showCaptionAboveMedia Pass True, if the caption must be shown above the message media
     * @param bool|null                                                                    $hasSpoiler            Pass True if the video needs to be covered with a spoiler animation
     * @param bool|null                                                                    $supportsStreaming     Pass True if the uploaded video is suitable for streaming
     * @param bool|null                                                                    $disableNotification   Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent        Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId       Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters       Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup           Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendVideo(
        int|string $chatId,
        InputFile|string $video,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        int $duration = null,
        int $width = null,
        int $height = null,
        InputFile|string $thumbnail = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $hasSpoiler = null,
        bool $supportsStreaming = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int|string                                                                   $chatId                Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile|string                                                             $animation             Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data. More information on Sending Files »
     * @param string|null                                                                  $businessConnectionId  Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId       Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param int|null                                                                     $duration              Duration of sent animation in seconds
     * @param int|null                                                                     $width                 Animation width
     * @param int|null                                                                     $height                Animation height
     * @param InputFile|string|null                                                        $thumbnail             Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param string|null                                                                  $caption               Animation caption (may also be used when resending animation by file_id), 0-1024 characters after entities parsing
     * @param string|null                                                                  $parseMode             Mode for parsing entities in the animation caption. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $captionEntities       A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|null                                                                    $showCaptionAboveMedia Pass True, if the caption must be shown above the message media
     * @param bool|null                                                                    $hasSpoiler            Pass True if the animation needs to be covered with a spoiler animation
     * @param bool|null                                                                    $disableNotification   Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent        Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId       Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters       Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup           Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendAnimation(
        int|string $chatId,
        InputFile|string $animation,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        int $duration = null,
        int $width = null,
        int $height = null,
        InputFile|string $thumbnail = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $hasSpoiler = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS, or in .MP3 format, or in .M4A format (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int|string                                                                   $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile|string                                                             $voice                Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files »
     * @param string|null                                                                  $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $caption              Voice message caption, 0-1024 characters after entities parsing
     * @param string|null                                                                  $parseMode            Mode for parsing entities in the voice message caption. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $captionEntities      A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param int|null                                                                     $duration             Duration of the voice message in seconds
     * @param bool|null                                                                    $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent       Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup          Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendVoice(
        int|string $chatId,
        InputFile|string $voice,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        int $duration = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * As of v.4.0, Telegram clients support rounded square MPEG4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile|string                                                             $videoNote            Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data. More information on Sending Files ». Sending video notes by a URL is currently unsupported
     * @param string|null                                                                  $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param int|null                                                                     $duration             Duration of sent video in seconds
     * @param int|null                                                                     $length               Video width and height, i.e. diameter of the video message
     * @param InputFile|string|null                                                        $thumbnail            Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param bool|null                                                                    $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent       Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup          Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendVideoNote(
        int|string $chatId,
        InputFile|string $videoNote,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        int $duration = null,
        int $length = null,
        InputFile|string $thumbnail = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send paid media. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId                Unique identifier for the target chat or username of the target channel (in the format @channelusername). If the chat is a channel, all Telegram Star proceeds from this media will be credited to the chat's balance. Otherwise, they will be credited to the bot's balance.
     * @param int                                                                          $starCount             The number of Telegram Stars that must be paid to buy access to the media
     * @param array<InputPaidMedia>                                                        $media                 A JSON-serialized array describing the media to be sent; up to 10 items
     * @param string|null                                                                  $businessConnectionId  Unique identifier of the business connection on behalf of which the message will be sent
     * @param string|null                                                                  $caption               Media caption, 0-1024 characters after entities parsing
     * @param string|null                                                                  $parseMode             Mode for parsing entities in the media caption. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $captionEntities       A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|null                                                                    $showCaptionAboveMedia Pass True, if the caption must be shown above the message media
     * @param bool|null                                                                    $disableNotification   Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent        Protects the contents of the sent message from forwarding and saving
     * @param ReplyParameters|null                                                         $replyParameters       Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup           Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendPaidMedia(
        int|string $chatId,
        int $starCount,
        array $media,
        string $businessConnectionId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of Messages that were sent is returned.
     *
     * @param int|string                                                                $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param array<InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo> $media                A JSON-serialized array describing messages to be sent, must include 2-10 items
     * @param string|null                                                               $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                  $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param bool|null                                                                 $disableNotification  Sends messages silently. Users will receive a notification with no sound.
     * @param bool|null                                                                 $protectContent       Protects the contents of the sent messages from forwarding and saving
     * @param string|null                                                               $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                      $replyParameters      Description of the message to reply to
     *
     * @return PromiseInterface<array<Message>>
     */
    public function sendMediaGroup(
        int|string $chatId,
        array $media,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["array<Shanginn\TelegramBotApiBindings\Types\Message>"]
        );
    }

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param float                                                                        $latitude             Latitude of the location
     * @param float                                                                        $longitude            Longitude of the location
     * @param string|null                                                                  $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param float|null                                                                   $horizontalAccuracy   The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null                                                                     $livePeriod           period in seconds during which the location will be updated (see Live Locations, should be between 60 and 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely
     * @param int|null                                                                     $heading              For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
     * @param int|null                                                                     $proximityAlertRadius For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
     * @param bool|null                                                                    $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent       Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup          Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendLocation(
        int|string $chatId,
        float $latitude,
        float $longitude,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        float $horizontalAccuracy = null,
        int $livePeriod = null,
        int $heading = null,
        int $proximityAlertRadius = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send information about a venue. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param float                                                                        $latitude             Latitude of the venue
     * @param float                                                                        $longitude            Longitude of the venue
     * @param string                                                                       $title                Name of the venue
     * @param string                                                                       $address              Address of the venue
     * @param string|null                                                                  $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $foursquareId         Foursquare identifier of the venue
     * @param string|null                                                                  $foursquareType       Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null                                                                  $googlePlaceId        Google Places identifier of the venue
     * @param string|null                                                                  $googlePlaceType      Google Places type of the venue. (See supported types.)
     * @param bool|null                                                                    $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent       Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup          Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendVenue(
        int|string $chatId,
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $foursquareId = null,
        string $foursquareType = null,
        string $googlePlaceId = null,
        string $googlePlaceType = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send phone contacts. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string                                                                       $phoneNumber          Contact's phone number
     * @param string                                                                       $firstName            Contact's first name
     * @param string|null                                                                  $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $lastName             Contact's last name
     * @param string|null                                                                  $vcard                Additional data about the contact in the form of a vCard, 0-2048 bytes
     * @param bool|null                                                                    $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent       Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup          Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendContact(
        int|string $chatId,
        string $phoneNumber,
        string $firstName,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $lastName = null,
        string $vcard = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send a native poll. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId                Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string                                                                       $question              Poll question, 1-300 characters
     * @param array<InputPollOption>                                                       $options               A JSON-serialized list of 2-10 answer options
     * @param string|null                                                                  $businessConnectionId  Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId       Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $questionParseMode     Mode for parsing entities in the question. See formatting options for more details. Currently, only custom emoji entities are allowed
     * @param array<MessageEntity>|null                                                    $questionEntities      A JSON-serialized list of special entities that appear in the poll question. It can be specified instead of question_parse_mode
     * @param bool|null                                                                    $isAnonymous           True, if the poll needs to be anonymous, defaults to True
     * @param string|null                                                                  $type                  Poll type, “quiz” or “regular”, defaults to “regular”
     * @param bool|null                                                                    $allowsMultipleAnswers True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
     * @param int|null                                                                     $correctOptionId       0-based identifier of the correct answer option, required for polls in quiz mode
     * @param string|null                                                                  $explanation           Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters with at most 2 line feeds after entities parsing
     * @param string|null                                                                  $explanationParseMode  Mode for parsing entities in the explanation. See formatting options for more details.
     * @param array<MessageEntity>|null                                                    $explanationEntities   A JSON-serialized list of special entities that appear in the poll explanation. It can be specified instead of explanation_parse_mode
     * @param int|null                                                                     $openPeriod            Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with close_date.
     * @param int|null                                                                     $closeDate             Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no more than 600 seconds in the future. Can't be used together with open_period.
     * @param bool|null                                                                    $isClosed              Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
     * @param bool|null                                                                    $disableNotification   Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent        Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId       Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters       Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup           Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendPoll(
        int|string $chatId,
        string $question,
        array $options,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $questionParseMode = null,
        array $questionEntities = null,
        ?bool $isAnonymous = true,
        ?string $type = 'regular',
        bool $allowsMultipleAnswers = null,
        int $correctOptionId = null,
        string $explanation = null,
        string $explanationParseMode = null,
        array $explanationEntities = null,
        int $openPeriod = null,
        int $closeDate = null,
        bool $isClosed = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|null                                                                  $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $emoji                Emoji on which the dice throw animation is based. Currently, must be one of “🎲”, “🎯”, “🏀”, “⚽”, “🎳”, or “🎰”. Dice can have values 1-6 for “🎲”, “🎯” and “🎳”, values 1-5 for “🏀” and “⚽”, and values 1-64 for “🎰”. Defaults to “🎲”
     * @param bool|null                                                                    $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent       Protects the contents of the sent message from forwarding
     * @param string|null                                                                  $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup          Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendDice(
        int|string $chatId,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        ?string $emoji = '🎲',
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
     * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
     *
     * @param int|string  $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string      $action               Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice notes, upload_document for general files, choose_sticker for stickers, find_location for location data, record_video_note or upload_video_note for video notes.
     * @param string|null $businessConnectionId Unique identifier of the business connection on behalf of which the action will be sent
     * @param int|null    $messageThreadId      Unique identifier for the target message thread; for supergroups only
     *
     * @return PromiseInterface<bool>
     */
    public function sendChatAction(
        int|string $chatId,
        string $action,
        string $businessConnectionId = null,
        int $messageThreadId = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to change the chosen reactions on a message. Service messages can't be reacted to. Automatically forwarded messages from a channel to its discussion group have the same available reactions as messages in the channel. Bots can't use paid reactions. Returns True on success.
     *
     * @param int|string               $chatId    Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int                      $messageId Identifier of the target message. If the message belongs to a media group, the reaction is set to the first non-deleted message in the group instead.
     * @param array<ReactionType>|null $reaction  A JSON-serialized list of reaction types to set on the message. Currently, as non-premium users, bots can set up to one reaction per message. A custom emoji reaction can be used if it is either already present on the message or explicitly allowed by chat administrators. Paid reactions can't be used by bots.
     * @param bool|null                $isBig     Pass True to set the reaction with a big animation
     *
     * @return PromiseInterface<bool>
     */
    public function setMessageReaction(
        int|string $chatId,
        int $messageId,
        array $reaction = null,
        bool $isBig = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
     *
     * @param int      $userId Unique identifier of the target user
     * @param int|null $offset Sequential number of the first photo to be returned. By default, all photos are returned.
     * @param int|null $limit  Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     *
     * @return PromiseInterface<UserProfilePhotos>
     */
    public function getUserProfilePhotos(int $userId, int $offset = null, ?int $limit = 100): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\UserProfilePhotos"]
        );
    }

    /**
     * Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
     *
     * @param string $fileId File identifier to get information about
     *
     * @return PromiseInterface<File>
     */
    public function getFile(string $fileId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\File"]
        );
    }

    /**
     * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param int|string $chatId         Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
     * @param int        $userId         Unique identifier of the target user
     * @param int|null   $untilDate      Date when the user will be unbanned; Unix time. If user is banned for more than 366 days or less than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.
     * @param bool|null  $revokeMessages Pass True to delete all messages from the chat for the user that is being removed. If False, the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups and channels.
     *
     * @return PromiseInterface<bool>
     */
    public function banChatMember(
        int|string $chatId,
        int $userId,
        int $untilDate = null,
        bool $revokeMessages = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
     *
     * @param int|string $chatId       Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
     * @param int        $userId       Unique identifier of the target user
     * @param bool|null  $onlyIfBanned Do nothing if the user is not banned
     *
     * @return PromiseInterface<bool>
     */
    public function unbanChatMember(int|string $chatId, int $userId, bool $onlyIfBanned = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
     *
     * @param int|string      $chatId                        Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int             $userId                        Unique identifier of the target user
     * @param ChatPermissions $permissions                   A JSON-serialized object for new user permissions
     * @param bool|null       $useIndependentChatPermissions Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
     * @param int|null        $untilDate                     Date when restrictions will be lifted for the user; Unix time. If user is restricted for more than 366 days or less than 30 seconds from the current time, they are considered to be restricted forever
     *
     * @return PromiseInterface<bool>
     */
    public function restrictChatMember(
        int|string $chatId,
        int $userId,
        ChatPermissions $permissions,
        bool $useIndependentChatPermissions = null,
        int $untilDate = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
     *
     * @param int|string $chatId              Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int        $userId              Unique identifier of the target user
     * @param bool|null  $isAnonymous         Pass True if the administrator's presence in the chat is hidden
     * @param bool|null  $canManageChat       Pass True if the administrator can access the chat event log, get boost list, see hidden supergroup and channel members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
     * @param bool|null  $canDeleteMessages   Pass True if the administrator can delete messages of other users
     * @param bool|null  $canManageVideoChats Pass True if the administrator can manage video chats
     * @param bool|null  $canRestrictMembers  Pass True if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     * @param bool|null  $canPromoteMembers   Pass True if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by him)
     * @param bool|null  $canChangeInfo       Pass True if the administrator can change chat title, photo and other settings
     * @param bool|null  $canInviteUsers      Pass True if the administrator can invite new users to the chat
     * @param bool|null  $canPostStories      Pass True if the administrator can post stories to the chat
     * @param bool|null  $canEditStories      Pass True if the administrator can edit stories posted by other users, post stories to the chat page, pin chat stories, and access the chat's story archive
     * @param bool|null  $canDeleteStories    Pass True if the administrator can delete stories posted by other users
     * @param bool|null  $canPostMessages     Pass True if the administrator can post messages in the channel, or access channel statistics; for channels only
     * @param bool|null  $canEditMessages     Pass True if the administrator can edit messages of other users and can pin messages; for channels only
     * @param bool|null  $canPinMessages      Pass True if the administrator can pin messages; for supergroups only
     * @param bool|null  $canManageTopics     Pass True if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
     *
     * @return PromiseInterface<bool>
     */
    public function promoteChatMember(
        int|string $chatId,
        int $userId,
        bool $isAnonymous = null,
        bool $canManageChat = null,
        bool $canDeleteMessages = null,
        bool $canManageVideoChats = null,
        bool $canRestrictMembers = null,
        bool $canPromoteMembers = null,
        bool $canChangeInfo = null,
        bool $canInviteUsers = null,
        bool $canPostStories = null,
        bool $canEditStories = null,
        bool $canDeleteStories = null,
        bool $canPostMessages = null,
        bool $canEditMessages = null,
        bool $canPinMessages = null,
        bool $canManageTopics = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
     *
     * @param int|string $chatId      Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int        $userId      Unique identifier of the target user
     * @param string     $customTitle New custom title for the administrator; 0-16 characters, emoji are not allowed
     *
     * @return PromiseInterface<bool>
     */
    public function setChatAdministratorCustomTitle(
        int|string $chatId,
        int $userId,
        string $customTitle,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param int|string $chatId       Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int        $senderChatId Unique identifier of the target sender chat
     *
     * @return PromiseInterface<bool>
     */
    public function banChatSenderChat(int|string $chatId, int $senderChatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param int|string $chatId       Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int        $senderChatId Unique identifier of the target sender chat
     *
     * @return PromiseInterface<bool>
     */
    public function unbanChatSenderChat(int|string $chatId, int $senderChatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
     *
     * @param int|string      $chatId                        Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param ChatPermissions $permissions                   A JSON-serialized object for new default chat permissions
     * @param bool|null       $useIndependentChatPermissions Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
     *
     * @return PromiseInterface<bool>
     */
    public function setChatPermissions(
        int|string $chatId,
        ChatPermissions $permissions,
        bool $useIndependentChatPermissions = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @return PromiseInterface<string>
     */
    public function exportChatInviteLink(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['string']
        );
    }

    /**
     * Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object.
     *
     * @param int|string  $chatId             Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|null $name               Invite link name; 0-32 characters
     * @param int|null    $expireDate         Point in time (Unix timestamp) when the link will expire
     * @param int|null    $memberLimit        The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
     * @param bool|null   $createsJoinRequest True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
     *
     * @return PromiseInterface<ChatInviteLink>
     */
    public function createChatInviteLink(
        int|string $chatId,
        string $name = null,
        int $expireDate = null,
        int $memberLimit = null,
        bool $createsJoinRequest = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\ChatInviteLink"]
        );
    }

    /**
     * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object.
     *
     * @param int|string  $chatId             Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string      $inviteLink         The invite link to edit
     * @param string|null $name               Invite link name; 0-32 characters
     * @param int|null    $expireDate         Point in time (Unix timestamp) when the link will expire
     * @param int|null    $memberLimit        The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
     * @param bool|null   $createsJoinRequest True, if users joining the chat via the link need to be approved by chat administrators. If True, member_limit can't be specified
     *
     * @return PromiseInterface<ChatInviteLink>
     */
    public function editChatInviteLink(
        int|string $chatId,
        string $inviteLink,
        string $name = null,
        int $expireDate = null,
        int $memberLimit = null,
        bool $createsJoinRequest = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\ChatInviteLink"]
        );
    }

    /**
     * Use this method to create a subscription invite link for a channel chat. The bot must have the can_invite_users administrator rights. The link can be edited using the method editChatSubscriptionInviteLink or revoked using the method revokeChatInviteLink. Returns the new invite link as a ChatInviteLink object.
     *
     * @param int|string  $chatId             Unique identifier for the target channel chat or username of the target channel (in the format @channelusername)
     * @param int         $subscriptionPeriod The number of seconds the subscription will be active for before the next payment. Currently, it must always be 2592000 (30 days).
     * @param int         $subscriptionPrice  The amount of Telegram Stars a user must pay initially and after each subsequent subscription period to be a member of the chat; 1-2500
     * @param string|null $name               Invite link name; 0-32 characters
     *
     * @return PromiseInterface<ChatInviteLink>
     */
    public function createChatSubscriptionInviteLink(
        int|string $chatId,
        int $subscriptionPeriod,
        int $subscriptionPrice,
        string $name = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\ChatInviteLink"]
        );
    }

    /**
     * Use this method to edit a subscription invite link created by the bot. The bot must have the can_invite_users administrator rights. Returns the edited invite link as a ChatInviteLink object.
     *
     * @param int|string  $chatId     Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string      $inviteLink The invite link to edit
     * @param string|null $name       Invite link name; 0-32 characters
     *
     * @return PromiseInterface<ChatInviteLink>
     */
    public function editChatSubscriptionInviteLink(
        int|string $chatId,
        string $inviteLink,
        string $name = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\ChatInviteLink"]
        );
    }

    /**
     * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as ChatInviteLink object.
     *
     * @param int|string $chatId     Unique identifier of the target chat or username of the target channel (in the format @channelusername)
     * @param string     $inviteLink The invite link to revoke
     *
     * @return PromiseInterface<ChatInviteLink>
     */
    public function revokeChatInviteLink(int|string $chatId, string $inviteLink): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\ChatInviteLink"]
        );
    }

    /**
     * Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int        $userId Unique identifier of the target user
     *
     * @return PromiseInterface<bool>
     */
    public function approveChatJoinRequest(int|string $chatId, int $userId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int        $userId Unique identifier of the target user
     *
     * @return PromiseInterface<bool>
     */
    public function declineChatJoinRequest(int|string $chatId, int $userId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile  $photo  New chat photo, uploaded using multipart/form-data
     *
     * @return PromiseInterface<bool>
     */
    public function setChatPhoto(int|string $chatId, InputFile $photo): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @return PromiseInterface<bool>
     */
    public function deleteChatPhoto(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string     $title  New chat title, 1-128 characters
     *
     * @return PromiseInterface<bool>
     */
    public function setChatTitle(int|string $chatId, string $title): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param int|string  $chatId      Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|null $description New chat description, 0-255 characters
     *
     * @return PromiseInterface<bool>
     */
    public function setChatDescription(int|string $chatId, string $description = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
     *
     * @param int|string  $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int         $messageId            Identifier of a message to pin
     * @param string|null $businessConnectionId Unique identifier of the business connection on behalf of which the message will be pinned
     * @param bool|null   $disableNotification  Pass True if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels and private chats.
     *
     * @return PromiseInterface<bool>
     */
    public function pinChatMessage(
        int|string $chatId,
        int $messageId,
        string $businessConnectionId = null,
        bool $disableNotification = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
     *
     * @param int|string  $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|null $businessConnectionId Unique identifier of the business connection on behalf of which the message will be unpinned
     * @param int|null    $messageId            Identifier of the message to unpin. Required if business_connection_id is specified. If not specified, the most recent pinned message (by sending date) will be unpinned.
     *
     * @return PromiseInterface<bool>
     */
    public function unpinChatMessage(
        int|string $chatId,
        string $businessConnectionId = null,
        int $messageId = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @return PromiseInterface<bool>
     */
    public function unpinAllChatMessages(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     *
     * @return PromiseInterface<bool>
     */
    public function leaveChat(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get up-to-date information about the chat. Returns a ChatFullInfo object on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     *
     * @return PromiseInterface<ChatFullInfo>
     */
    public function getChat(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\ChatFullInfo"]
        );
    }

    /**
     * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember objects.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     *
     * @return PromiseInterface<array<ChatMember>>
     */
    public function getChatAdministrators(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["array<Shanginn\TelegramBotApiBindings\Types\ChatMember>"]
        );
    }

    /**
     * Use this method to get the number of members in a chat. Returns Int on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     *
     * @return PromiseInterface<int>
     */
    public function getChatMemberCount(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['int']
        );
    }

    /**
     * Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the bot is an administrator in the chat. Returns a ChatMember object on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
     * @param int        $userId Unique identifier of the target user
     *
     * @return PromiseInterface<ChatMember>
     */
    public function getChatMember(int|string $chatId, int $userId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\ChatMember"]
        );
    }

    /**
     * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
     *
     * @param int|string $chatId         Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string     $stickerSetName Name of the sticker set to be set as the group sticker set
     *
     * @return PromiseInterface<bool>
     */
    public function setChatStickerSet(int|string $chatId, string $stickerSetName): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return PromiseInterface<bool>
     */
    public function deleteChatStickerSet(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no parameters. Returns an Array of Sticker objects.
     *
     * @return PromiseInterface<array<Sticker>>
     */
    public function getForumTopicIconStickers(): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["array<Shanginn\TelegramBotApiBindings\Types\Sticker>"]
        );
    }

    /**
     * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns information about the created topic as a ForumTopic object.
     *
     * @param int|string  $chatId            Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string      $name              Topic name, 1-128 characters
     * @param int|null    $iconColor         Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590 (0xFFD67E), 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
     * @param string|null $iconCustomEmojiId Unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
     *
     * @return PromiseInterface<ForumTopic>
     */
    public function createForumTopic(
        int|string $chatId,
        string $name,
        int $iconColor = null,
        string $iconCustomEmojiId = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\ForumTopic"]
        );
    }

    /**
     * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     *
     * @param int|string  $chatId            Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int         $messageThreadId   Unique identifier for the target message thread of the forum topic
     * @param string|null $name              New topic name, 0-128 characters. If not specified or empty, the current name of the topic will be kept
     * @param string|null $iconCustomEmojiId New unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers. Pass an empty string to remove the icon. If not specified, the current icon will be kept
     *
     * @return PromiseInterface<bool>
     */
    public function editForumTopic(
        int|string $chatId,
        int $messageThreadId,
        string $name = null,
        string $iconCustomEmojiId = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     *
     * @param int|string $chatId          Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int        $messageThreadId Unique identifier for the target message thread of the forum topic
     *
     * @return PromiseInterface<bool>
     */
    public function closeForumTopic(int|string $chatId, int $messageThreadId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     *
     * @param int|string $chatId          Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int        $messageThreadId Unique identifier for the target message thread of the forum topic
     *
     * @return PromiseInterface<bool>
     */
    public function reopenForumTopic(int|string $chatId, int $messageThreadId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_delete_messages administrator rights. Returns True on success.
     *
     * @param int|string $chatId          Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int        $messageThreadId Unique identifier for the target message thread of the forum topic
     *
     * @return PromiseInterface<bool>
     */
    public function deleteForumTopic(int|string $chatId, int $messageThreadId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     *
     * @param int|string $chatId          Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int        $messageThreadId Unique identifier for the target message thread of the forum topic
     *
     * @return PromiseInterface<bool>
     */
    public function unpinAllForumTopicMessages(int|string $chatId, int $messageThreadId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string     $name   New topic name, 1-128 characters
     *
     * @return PromiseInterface<bool>
     */
    public function editGeneralForumTopic(int|string $chatId, string $name): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return PromiseInterface<bool>
     */
    public function closeGeneralForumTopic(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically unhidden if it was hidden. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return PromiseInterface<bool>
     */
    public function reopenGeneralForumTopic(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically closed if it was open. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return PromiseInterface<bool>
     */
    public function hideGeneralForumTopic(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return PromiseInterface<bool>
     */
    public function unhideGeneralForumTopic(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     *
     * @param int|string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return PromiseInterface<bool>
     */
    public function unpinAllGeneralForumTopicMessages(int|string $chatId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
     *
     * @param string      $callbackQueryId Unique identifier for the query to be answered
     * @param string|null $text            Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
     * @param bool|null   $showAlert       If True, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults to false.
     * @param string|null $url             URL that will be opened by the user's client. If you have created a Game and accepted the conditions via @BotFather, specify the URL that opens your game - note that this will only work if the query comes from a callback_game button.Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
     * @param int|null    $cacheTime       The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram apps will support caching starting in version 3.14. Defaults to 0.
     *
     * @return PromiseInterface<bool>
     */
    public function answerCallbackQuery(
        string $callbackQueryId,
        string $text = null,
        bool $showAlert = null,
        string $url = null,
        int $cacheTime = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get the list of boosts added to a chat by a user. Requires administrator rights in the chat. Returns a UserChatBoosts object.
     *
     * @param int|string $chatId Unique identifier for the chat or username of the channel (in the format @channelusername)
     * @param int        $userId Unique identifier of the target user
     *
     * @return PromiseInterface<UserChatBoosts>
     */
    public function getUserChatBoosts(int|string $chatId, int $userId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\UserChatBoosts"]
        );
    }

    /**
     * Use this method to get information about the connection of the bot with a business account. Returns a BusinessConnection object on success.
     *
     * @param string $businessConnectionId Unique identifier of the business connection
     *
     * @return PromiseInterface<BusinessConnection>
     */
    public function getBusinessConnection(string $businessConnectionId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\BusinessConnection"]
        );
    }

    /**
     * Use this method to change the list of the bot's commands. See this manual for more details about bot commands. Returns True on success.
     *
     * @param array<BotCommand>    $commands     A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most 100 commands can be specified.
     * @param BotCommandScope|null $scope        A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
     * @param string|null          $languageCode A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
     *
     * @return PromiseInterface<bool>
     */
    public function setMyCommands(
        array $commands,
        BotCommandScope $scope = null,
        string $languageCode = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level commands will be shown to affected users. Returns True on success.
     *
     * @param BotCommandScope|null $scope        A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
     * @param string|null          $languageCode A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
     *
     * @return PromiseInterface<bool>
     */
    public function deleteMyCommands(BotCommandScope $scope = null, string $languageCode = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of BotCommand objects. If commands aren't set, an empty list is returned.
     *
     * @param BotCommandScope|null $scope        A JSON-serialized object, describing scope of users. Defaults to BotCommandScopeDefault.
     * @param string|null          $languageCode A two-letter ISO 639-1 language code or an empty string
     *
     * @return PromiseInterface<array<BotCommand>>
     */
    public function getMyCommands(BotCommandScope $scope = null, string $languageCode = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["array<Shanginn\TelegramBotApiBindings\Types\BotCommand>"]
        );
    }

    /**
     * Use this method to change the bot's name. Returns True on success.
     *
     * @param string|null $name         New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for the given language.
     * @param string|null $languageCode A two-letter ISO 639-1 language code. If empty, the name will be shown to all users for whose language there is no dedicated name.
     *
     * @return PromiseInterface<bool>
     */
    public function setMyName(string $name = null, string $languageCode = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get the current bot name for the given user language. Returns BotName on success.
     *
     * @param string|null $languageCode A two-letter ISO 639-1 language code or an empty string
     *
     * @return PromiseInterface<BotName>
     */
    public function getMyName(string $languageCode = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\BotName"]
        );
    }

    /**
     * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns True on success.
     *
     * @param string|null $description  New bot description; 0-512 characters. Pass an empty string to remove the dedicated description for the given language.
     * @param string|null $languageCode A two-letter ISO 639-1 language code. If empty, the description will be applied to all users for whose language there is no dedicated description.
     *
     * @return PromiseInterface<bool>
     */
    public function setMyDescription(string $description = null, string $languageCode = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get the current bot description for the given user language. Returns BotDescription on success.
     *
     * @param string|null $languageCode A two-letter ISO 639-1 language code or an empty string
     *
     * @return PromiseInterface<BotDescription>
     */
    public function getMyDescription(string $languageCode = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\BotDescription"]
        );
    }

    /**
     * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with the link when users share the bot. Returns True on success.
     *
     * @param string|null $shortDescription New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated short description for the given language.
     * @param string|null $languageCode     A two-letter ISO 639-1 language code. If empty, the short description will be applied to all users for whose language there is no dedicated short description.
     *
     * @return PromiseInterface<bool>
     */
    public function setMyShortDescription(
        string $shortDescription = null,
        string $languageCode = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get the current bot short description for the given user language. Returns BotShortDescription on success.
     *
     * @param string|null $languageCode A two-letter ISO 639-1 language code or an empty string
     *
     * @return PromiseInterface<BotShortDescription>
     */
    public function getMyShortDescription(string $languageCode = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\BotShortDescription"]
        );
    }

    /**
     * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
     *
     * @param int|null        $chatId     Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
     * @param MenuButton|null $menuButton A JSON-serialized object for the bot's new menu button. Defaults to MenuButtonDefault
     *
     * @return PromiseInterface<bool>
     */
    public function setChatMenuButton(int $chatId = null, MenuButton $menuButton = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton on success.
     *
     * @param int|null $chatId Unique identifier for the target private chat. If not specified, default bot's menu button will be returned
     *
     * @return PromiseInterface<MenuButton>
     */
    public function getChatMenuButton(int $chatId = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\MenuButton"]
        );
    }

    /**
     * Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are free to modify the list before adding the bot. Returns True on success.
     *
     * @param ChatAdministratorRights|null $rights      A JSON-serialized object describing new default administrator rights. If not specified, the default administrator rights will be cleared.
     * @param bool|null                    $forChannels Pass True to change the default administrator rights of the bot in channels. Otherwise, the default administrator rights of the bot for groups and supergroups will be changed.
     *
     * @return PromiseInterface<bool>
     */
    public function setMyDefaultAdministratorRights(
        ChatAdministratorRights $rights = null,
        bool $forChannels = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
     *
     * @param bool|null $forChannels Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
     *
     * @return PromiseInterface<ChatAdministratorRights>
     */
    public function getMyDefaultAdministratorRights(bool $forChannels = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\ChatAdministratorRights"]
        );
    }

    /**
     * Use this method to edit text and game messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     *
     * @param string                    $text                 New text of the message, 1-4096 characters after entities parsing
     * @param string|null               $businessConnectionId Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|null           $chatId               Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|null                  $messageId            Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null               $inlineMessageId      Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param string|null               $parseMode            Mode for parsing entities in the message text. See formatting options for more details.
     * @param array<MessageEntity>|null $entities             A JSON-serialized list of special entities that appear in message text, which can be specified instead of parse_mode
     * @param LinkPreviewOptions|null   $linkPreviewOptions   Link preview generation options for the message
     * @param InlineKeyboardMarkup|null $replyMarkup          a JSON-serialized object for an inline keyboard
     *
     * @return PromiseInterface<Message|bool>
     */
    public function editMessageText(
        string $text,
        string $businessConnectionId = null,
        int|string $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        string $parseMode = null,
        array $entities = null,
        LinkPreviewOptions $linkPreviewOptions = null,
        InlineKeyboardMarkup $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message", 'bool']
        );
    }

    /**
     * Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     *
     * @param string|null               $businessConnectionId  Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|null           $chatId                Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|null                  $messageId             Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null               $inlineMessageId       Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param string|null               $caption               New caption of the message, 0-1024 characters after entities parsing
     * @param string|null               $parseMode             Mode for parsing entities in the message caption. See formatting options for more details.
     * @param array<MessageEntity>|null $captionEntities       A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|null                 $showCaptionAboveMedia Pass True, if the caption must be shown above the message media. Supported only for animation, photo and video messages.
     * @param InlineKeyboardMarkup|null $replyMarkup           a JSON-serialized object for an inline keyboard
     *
     * @return PromiseInterface<Message|bool>
     */
    public function editMessageCaption(
        string $businessConnectionId = null,
        int|string $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        string $caption = null,
        string $parseMode = null,
        array $captionEntities = null,
        bool $showCaptionAboveMedia = null,
        InlineKeyboardMarkup $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message", 'bool']
        );
    }

    /**
     * Use this method to edit animation, audio, document, photo, or video messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     *
     * @param InputMedia                $media                A JSON-serialized object for a new media content of the message
     * @param string|null               $businessConnectionId Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|null           $chatId               Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|null                  $messageId            Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null               $inlineMessageId      Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param InlineKeyboardMarkup|null $replyMarkup          a JSON-serialized object for a new inline keyboard
     *
     * @return PromiseInterface<Message|bool>
     */
    public function editMessageMedia(
        InputMedia $media,
        string $businessConnectionId = null,
        int|string $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        InlineKeyboardMarkup $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message", 'bool']
        );
    }

    /**
     * Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @param float                     $latitude             Latitude of new location
     * @param float                     $longitude            Longitude of new location
     * @param string|null               $businessConnectionId Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|null           $chatId               Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|null                  $messageId            Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null               $inlineMessageId      Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param int|null                  $livePeriod           New period in seconds during which the location can be updated, starting from the message send date. If 0x7FFFFFFF is specified, then the location can be updated forever. Otherwise, the new value must not exceed the current live_period by more than a day, and the live location expiration date must remain within the next 90 days. If not specified, then live_period remains unchanged
     * @param float|null                $horizontalAccuracy   The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null                  $heading              Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
     * @param int|null                  $proximityAlertRadius The maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
     * @param InlineKeyboardMarkup|null $replyMarkup          a JSON-serialized object for a new inline keyboard
     *
     * @return PromiseInterface<Message|bool>
     */
    public function editMessageLiveLocation(
        float $latitude,
        float $longitude,
        string $businessConnectionId = null,
        int|string $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        int $livePeriod = null,
        float $horizontalAccuracy = null,
        int $heading = null,
        int $proximityAlertRadius = null,
        InlineKeyboardMarkup $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message", 'bool']
        );
    }

    /**
     * Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @param string|null               $businessConnectionId Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|null           $chatId               Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|null                  $messageId            Required if inline_message_id is not specified. Identifier of the message with live location to stop
     * @param string|null               $inlineMessageId      Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param InlineKeyboardMarkup|null $replyMarkup          a JSON-serialized object for a new inline keyboard
     *
     * @return PromiseInterface<Message|bool>
     */
    public function stopMessageLiveLocation(
        string $businessConnectionId = null,
        int|string $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        InlineKeyboardMarkup $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message", 'bool']
        );
    }

    /**
     * Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     *
     * @param string|null               $businessConnectionId Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|null           $chatId               Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|null                  $messageId            Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|null               $inlineMessageId      Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param InlineKeyboardMarkup|null $replyMarkup          a JSON-serialized object for an inline keyboard
     *
     * @return PromiseInterface<Message|bool>
     */
    public function editMessageReplyMarkup(
        string $businessConnectionId = null,
        int|string $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
        InlineKeyboardMarkup $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message", 'bool']
        );
    }

    /**
     * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
     *
     * @param int|string                $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int                       $messageId            Identifier of the original message with the poll
     * @param string|null               $businessConnectionId Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param InlineKeyboardMarkup|null $replyMarkup          a JSON-serialized object for a new message inline keyboard
     *
     * @return PromiseInterface<Poll>
     */
    public function stopPoll(
        int|string $chatId,
        int $messageId,
        string $businessConnectionId = null,
        InlineKeyboardMarkup $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Poll"]
        );
    }

    /**
     * Use this method to delete a message, including service messages, with the following limitations:- A message can only be deleted if it was sent less than 48 hours ago.- Service messages about a supergroup, channel, or forum topic creation can't be deleted.- A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.- Bots can delete outgoing messages in private chats, groups, and supergroups.- Bots can delete incoming messages in private chats.- Bots granted can_post_messages permissions can delete outgoing messages in channels.- If the bot is an administrator of a group, it can delete any message there.- If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.Returns True on success.
     *
     * @param int|string $chatId    Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int        $messageId Identifier of the message to delete
     *
     * @return PromiseInterface<bool>
     */
    public function deleteMessage(int|string $chatId, int $messageId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to delete multiple messages simultaneously. If some of the specified messages can't be found, they are skipped. Returns True on success.
     *
     * @param int|string $chatId     Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param array<int> $messageIds A JSON-serialized list of 1-100 identifiers of messages to delete. See deleteMessage for limitations on which messages can be deleted
     *
     * @return PromiseInterface<bool>
     */
    public function deleteMessages(int|string $chatId, array $messageIds): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent Message is returned.
     *
     * @param int|string                                                                   $chatId               Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile|string                                                             $sticker              Sticker to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a .WEBP sticker from the Internet, or upload a new .WEBP, .TGS, or .WEBM sticker using multipart/form-data. More information on Sending Files ». Video and animated stickers can't be sent via an HTTP URL.
     * @param string|null                                                                  $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null                                                                  $emoji                Emoji associated with the sticker; only for just uploaded stickers
     * @param bool|null                                                                    $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protectContent       Protects the contents of the sent message from forwarding and saving
     * @param string|null                                                                  $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null                                                         $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $replyMarkup          Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return PromiseInterface<Message>
     */
    public function sendSticker(
        int|string $chatId,
        InputFile|string $sticker,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        string $emoji = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to get a sticker set. On success, a StickerSet object is returned.
     *
     * @param string $name Name of the sticker set
     *
     * @return PromiseInterface<StickerSet>
     */
    public function getStickerSet(string $name): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\StickerSet"]
        );
    }

    /**
     * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
     *
     * @param array<string> $customEmojiIds A JSON-serialized list of custom emoji identifiers. At most 200 custom emoji identifiers can be specified.
     *
     * @return PromiseInterface<array<Sticker>>
     */
    public function getCustomEmojiStickers(array $customEmojiIds): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["array<Shanginn\TelegramBotApiBindings\Types\Sticker>"]
        );
    }

    /**
     * Use this method to upload a file with a sticker for later use in the createNewStickerSet, addStickerToSet, or replaceStickerInSet methods (the file can be used multiple times). Returns the uploaded File on success.
     *
     * @param int       $userId        User identifier of sticker file owner
     * @param InputFile $sticker       A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See https://core.telegram.org/stickers for technical requirements. More information on Sending Files »
     * @param string    $stickerFormat Format of the sticker, must be one of “static”, “animated”, “video”
     *
     * @return PromiseInterface<File>
     */
    public function uploadStickerFile(int $userId, InputFile $sticker, string $stickerFormat): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\File"]
        );
    }

    /**
     * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. Returns True on success.
     *
     * @param int                 $userId          User identifier of created sticker set owner
     * @param string              $name            Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only English letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in "_by_<bot_username>". <bot_username> is case insensitive. 1-64 characters.
     * @param string              $title           Sticker set title, 1-64 characters
     * @param array<InputSticker> $stickers        A JSON-serialized list of 1-50 initial stickers to be added to the sticker set
     * @param string|null         $stickerType     Type of stickers in the set, pass “regular”, “mask”, or “custom_emoji”. By default, a regular sticker set is created.
     * @param bool|null           $needsRepainting Pass True if stickers in the sticker set must be repainted to the color of text when used in messages, the accent color if used as emoji status, white on chat photos, or another appropriate color based on context; for custom emoji sticker sets only
     *
     * @return PromiseInterface<bool>
     */
    public function createNewStickerSet(
        int $userId,
        string $name,
        string $title,
        array $stickers,
        string $stickerType = null,
        bool $needsRepainting = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to add a new sticker to a set created by the bot. Emoji sticker sets can have up to 200 stickers. Other sticker sets can have up to 120 stickers. Returns True on success.
     *
     * @param int          $userId  User identifier of sticker set owner
     * @param string       $name    Sticker set name
     * @param InputSticker $sticker A JSON-serialized object with information about the added sticker. If exactly the same sticker had already been added to the set, then the set isn't changed.
     *
     * @return PromiseInterface<bool>
     */
    public function addStickerToSet(int $userId, string $name, InputSticker $sticker): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
     *
     * @param string $sticker  File identifier of the sticker
     * @param int    $position New sticker position in the set, zero-based
     *
     * @return PromiseInterface<bool>
     */
    public function setStickerPositionInSet(string $sticker, int $position): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to delete a sticker from a set created by the bot. Returns True on success.
     *
     * @param string $sticker File identifier of the sticker
     *
     * @return PromiseInterface<bool>
     */
    public function deleteStickerFromSet(string $sticker): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to replace an existing sticker in a sticker set with a new one. The method is equivalent to calling deleteStickerFromSet, then addStickerToSet, then setStickerPositionInSet. Returns True on success.
     *
     * @param int          $userId     User identifier of the sticker set owner
     * @param string       $name       Sticker set name
     * @param string       $oldSticker File identifier of the replaced sticker
     * @param InputSticker $sticker    A JSON-serialized object with information about the added sticker. If exactly the same sticker had already been added to the set, then the set remains unchanged.
     *
     * @return PromiseInterface<bool>
     */
    public function replaceStickerInSet(
        int $userId,
        string $name,
        string $oldSticker,
        InputSticker $sticker,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
     *
     * @param string        $sticker   File identifier of the sticker
     * @param array<string> $emojiList A JSON-serialized list of 1-20 emoji associated with the sticker
     *
     * @return PromiseInterface<bool>
     */
    public function setStickerEmojiList(string $sticker, array $emojiList): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
     *
     * @param string             $sticker  File identifier of the sticker
     * @param array<string>|null $keywords A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64 characters
     *
     * @return PromiseInterface<bool>
     */
    public function setStickerKeywords(string $sticker, array $keywords = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to change the mask position of a mask sticker. The sticker must belong to a sticker set that was created by the bot. Returns True on success.
     *
     * @param string            $sticker      File identifier of the sticker
     * @param MaskPosition|null $maskPosition A JSON-serialized object with the position where the mask should be placed on faces. Omit the parameter to remove the mask position.
     *
     * @return PromiseInterface<bool>
     */
    public function setStickerMaskPosition(string $sticker, MaskPosition $maskPosition = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to set the title of a created sticker set. Returns True on success.
     *
     * @param string $name  Sticker set name
     * @param string $title Sticker set title, 1-64 characters
     *
     * @return PromiseInterface<bool>
     */
    public function setStickerSetTitle(string $name, string $title): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must match the format of the stickers in the set. Returns True on success.
     *
     * @param string                $name      Sticker set name
     * @param int                   $userId    User identifier of the sticker set owner
     * @param string                $format    Format of the thumbnail, must be one of “static” for a .WEBP or .PNG image, “animated” for a .TGS animation, or “video” for a WEBM video
     * @param InputFile|string|null $thumbnail A .WEBP or .PNG image with the thumbnail, must be up to 128 kilobytes in size and have a width and height of exactly 100px, or a .TGS animation with a thumbnail up to 32 kilobytes in size (see https://core.telegram.org/stickers#animation-requirements for animated sticker technical requirements), or a WEBM video with the thumbnail up to 32 kilobytes in size; see https://core.telegram.org/stickers#video-requirements for video sticker technical requirements. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More information on Sending Files ». Animated and video sticker set thumbnails can't be uploaded via HTTP URL. If omitted, then the thumbnail is dropped and the first sticker is used as the thumbnail.
     *
     * @return PromiseInterface<bool>
     */
    public function setStickerSetThumbnail(
        string $name,
        int $userId,
        string $format,
        InputFile|string $thumbnail = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
     *
     * @param string      $name          Sticker set name
     * @param string|null $customEmojiId custom emoji identifier of a sticker from the sticker set; pass an empty string to drop the thumbnail and use the first sticker as the thumbnail
     *
     * @return PromiseInterface<bool>
     */
    public function setCustomEmojiStickerSetThumbnail(string $name, string $customEmojiId = null): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to delete a sticker set that was created by the bot. Returns True on success.
     *
     * @param string $name Sticker set name
     *
     * @return PromiseInterface<bool>
     */
    public function deleteStickerSet(string $name): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to send answers to an inline query. On success, True is returned.No more than 50 results per query are allowed.
     *
     * @param string                        $inlineQueryId Unique identifier for the answered query
     * @param array<InlineQueryResult>      $results       A JSON-serialized array of results for the inline query
     * @param int|null                      $cacheTime     The maximum amount of time in seconds that the result of the inline query may be cached on the server. Defaults to 300.
     * @param bool|null                     $isPersonal    Pass True if results may be cached on the server side only for the user that sent the query. By default, results may be returned to any user who sends the same query.
     * @param string|null                   $nextOffset    Pass the offset that a client should send in the next query with the same text to receive more results. Pass an empty string if there are no more results or if you don't support pagination. Offset length can't exceed 64 bytes.
     * @param InlineQueryResultsButton|null $button        A JSON-serialized object describing a button to be shown above inline query results
     *
     * @return PromiseInterface<bool>
     */
    public function answerInlineQuery(
        string $inlineQueryId,
        array $results,
        ?int $cacheTime = 300,
        bool $isPersonal = null,
        string $nextOffset = null,
        InlineQueryResultsButton $button = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
     *
     * @param string            $webAppQueryId Unique identifier for the query to be answered
     * @param InlineQueryResult $result        A JSON-serialized object describing the message to be sent
     *
     * @return PromiseInterface<SentWebAppMessage>
     */
    public function answerWebAppQuery(string $webAppQueryId, InlineQueryResult $result): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\SentWebAppMessage"]
        );
    }

    /**
     * Use this method to send invoices. On success, the sent Message is returned.
     *
     * @param int|string                $chatId                    Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string                    $title                     Product name, 1-32 characters
     * @param string                    $description               Product description, 1-255 characters
     * @param string                    $payload                   Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
     * @param string                    $currency                  Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram Stars.
     * @param array<LabeledPrice>       $prices                    Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
     * @param int|null                  $messageThreadId           Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|null               $providerToken             Payment provider token, obtained via @BotFather. Pass an empty string for payments in Telegram Stars.
     * @param int|null                  $maxTipAmount              The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not supported for payments in Telegram Stars.
     * @param array<int>|null           $suggestedTipAmounts       A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
     * @param string|null               $startParameter            Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay button, allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty, forwarded copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the value used as the start parameter
     * @param string|null               $providerData              JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
     * @param string|null               $photoUrl                  URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People like it better when they see what they are paying for.
     * @param int|null                  $photoSize                 Photo size in bytes
     * @param int|null                  $photoWidth                Photo width
     * @param int|null                  $photoHeight               Photo height
     * @param bool|null                 $needName                  Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null                 $needPhoneNumber           Pass True if you require the user's phone number to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null                 $needEmail                 Pass True if you require the user's email address to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null                 $needShippingAddress       Pass True if you require the user's shipping address to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null                 $sendPhoneNumberToProvider Pass True if the user's phone number should be sent to the provider. Ignored for payments in Telegram Stars.
     * @param bool|null                 $sendEmailToProvider       Pass True if the user's email address should be sent to the provider. Ignored for payments in Telegram Stars.
     * @param bool|null                 $isFlexible                Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars.
     * @param bool|null                 $disableNotification       Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                 $protectContent            Protects the contents of the sent message from forwarding and saving
     * @param string|null               $messageEffectId           Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null      $replyParameters           Description of the message to reply to
     * @param InlineKeyboardMarkup|null $replyMarkup               A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not empty, the first button must be a Pay button.
     *
     * @return PromiseInterface<Message>
     */
    public function sendInvoice(
        int|string $chatId,
        string $title,
        string $description,
        string $payload,
        string $currency,
        array $prices,
        int $messageThreadId = null,
        string $providerToken = null,
        int $maxTipAmount = null,
        array $suggestedTipAmounts = null,
        string $startParameter = null,
        string $providerData = null,
        string $photoUrl = null,
        int $photoSize = null,
        int $photoWidth = null,
        int $photoHeight = null,
        bool $needName = null,
        bool $needPhoneNumber = null,
        bool $needEmail = null,
        bool $needShippingAddress = null,
        bool $sendPhoneNumberToProvider = null,
        bool $sendEmailToProvider = null,
        bool $isFlexible = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to create a link for an invoice. Returns the created invoice link as String on success.
     *
     * @param string              $title                     Product name, 1-32 characters
     * @param string              $description               Product description, 1-255 characters
     * @param string              $payload                   Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes.
     * @param string              $currency                  Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram Stars.
     * @param array<LabeledPrice> $prices                    Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
     * @param string|null         $providerToken             Payment provider token, obtained via @BotFather. Pass an empty string for payments in Telegram Stars.
     * @param int|null            $maxTipAmount              The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not supported for payments in Telegram Stars.
     * @param array<int>|null     $suggestedTipAmounts       A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount.
     * @param string|null         $providerData              JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed description of required fields should be provided by the payment provider.
     * @param string|null         $photoUrl                  URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
     * @param int|null            $photoSize                 Photo size in bytes
     * @param int|null            $photoWidth                Photo width
     * @param int|null            $photoHeight               Photo height
     * @param bool|null           $needName                  Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null           $needPhoneNumber           Pass True if you require the user's phone number to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null           $needEmail                 Pass True if you require the user's email address to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null           $needShippingAddress       Pass True if you require the user's shipping address to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null           $sendPhoneNumberToProvider Pass True if the user's phone number should be sent to the provider. Ignored for payments in Telegram Stars.
     * @param bool|null           $sendEmailToProvider       Pass True if the user's email address should be sent to the provider. Ignored for payments in Telegram Stars.
     * @param bool|null           $isFlexible                Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars.
     *
     * @return PromiseInterface<string>
     */
    public function createInvoiceLink(
        string $title,
        string $description,
        string $payload,
        string $currency,
        array $prices,
        string $providerToken = null,
        int $maxTipAmount = null,
        array $suggestedTipAmounts = null,
        string $providerData = null,
        string $photoUrl = null,
        int $photoSize = null,
        int $photoWidth = null,
        int $photoHeight = null,
        bool $needName = null,
        bool $needPhoneNumber = null,
        bool $needEmail = null,
        bool $needShippingAddress = null,
        bool $sendPhoneNumberToProvider = null,
        bool $sendEmailToProvider = null,
        bool $isFlexible = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['string']
        );
    }

    /**
     * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
     *
     * @param string                     $shippingQueryId Unique identifier for the query to be answered
     * @param bool                       $ok              Pass True if delivery to the specified address is possible and False if there are any problems (for example, if delivery to the specified address is not possible)
     * @param array<ShippingOption>|null $shippingOptions Required if ok is True. A JSON-serialized array of available shipping options.
     * @param string|null                $errorMessage    Required if ok is False. Error message in human readable form that explains why it is impossible to complete the order (e.g. "Sorry, delivery to your desired address is unavailable'). Telegram will display this message to the user.
     *
     * @return PromiseInterface<bool>
     */
    public function answerShippingQuery(
        string $shippingQueryId,
        bool $ok,
        array $shippingOptions = null,
        string $errorMessage = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an Update with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
     *
     * @param string      $preCheckoutQueryId Unique identifier for the query to be answered
     * @param bool        $ok                 Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the order. Use False if there are any problems.
     * @param string|null $errorMessage       Required if ok is False. Error message in human readable form that explains the reason for failure to proceed with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you were busy filling out your payment details. Please choose a different color or garment!"). Telegram will display this message to the user.
     *
     * @return PromiseInterface<bool>
     */
    public function answerPreCheckoutQuery(
        string $preCheckoutQueryId,
        bool $ok,
        string $errorMessage = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Returns the bot's Telegram Star transactions in chronological order. On success, returns a StarTransactions object.
     *
     * @param int|null $offset Number of transactions to skip in the response
     * @param int|null $limit  The maximum number of transactions to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     *
     * @return PromiseInterface<StarTransactions>
     */
    public function getStarTransactions(int $offset = null, ?int $limit = 100): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\StarTransactions"]
        );
    }

    /**
     * Refunds a successful payment in Telegram Stars. Returns True on success.
     *
     * @param int    $userId                  Identifier of the user whose payment will be refunded
     * @param string $telegramPaymentChargeId Telegram payment identifier
     *
     * @return PromiseInterface<bool>
     */
    public function refundStarPayment(int $userId, string $telegramPaymentChargeId): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.
     * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
     *
     * @param int                         $userId User identifier
     * @param array<PassportElementError> $errors A JSON-serialized array describing the errors
     *
     * @return PromiseInterface<bool>
     */
    public function setPassportDataErrors(int $userId, array $errors): PromiseInterface
    {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ['bool']
        );
    }

    /**
     * Use this method to send a game. On success, the sent Message is returned.
     *
     * @param int                       $chatId               Unique identifier for the target chat
     * @param string                    $gameShortName        Short name of the game, serves as the unique identifier for the game. Set up your games via @BotFather.
     * @param string|null               $businessConnectionId Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                  $messageThreadId      Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param bool|null                 $disableNotification  Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                 $protectContent       Protects the contents of the sent message from forwarding and saving
     * @param string|null               $messageEffectId      Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|null      $replyParameters      Description of the message to reply to
     * @param InlineKeyboardMarkup|null $replyMarkup          A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be shown. If not empty, the first button must launch the game.
     *
     * @return PromiseInterface<Message>
     */
    public function sendGame(
        int $chatId,
        string $gameShortName,
        string $businessConnectionId = null,
        int $messageThreadId = null,
        bool $disableNotification = null,
        bool $protectContent = null,
        string $messageEffectId = null,
        ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup $replyMarkup = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message"]
        );
    }

    /**
     * Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the Message is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
     *
     * @param int         $userId             User identifier
     * @param int         $score              New score, must be non-negative
     * @param bool|null   $force              Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes or banning cheaters
     * @param bool|null   $disableEditMessage Pass True if the game message should not be automatically edited to include the current scoreboard
     * @param int|null    $chatId             Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param int|null    $messageId          Required if inline_message_id is not specified. Identifier of the sent message
     * @param string|null $inlineMessageId    Required if chat_id and message_id are not specified. Identifier of the inline message
     *
     * @return PromiseInterface<Message|bool>
     */
    public function setGameScore(
        int $userId,
        int $score,
        bool $force = null,
        bool $disableEditMessage = null,
        int $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["Shanginn\TelegramBotApiBindings\Types\Message", 'bool']
        );
    }

    /**
     * Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. Returns an Array of GameHighScore objects.
     *
     * @param int         $userId          Target user id
     * @param int|null    $chatId          Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param int|null    $messageId       Required if inline_message_id is not specified. Identifier of the sent message
     * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
     *
     * @return PromiseInterface<array<GameHighScore>>
     */
    public function getGameHighScores(
        int $userId,
        int $chatId = null,
        int $messageId = null,
        string $inlineMessageId = null,
    ): PromiseInterface {
        return $this->doRequest(
            __FUNCTION__,
            get_defined_vars(),
            ["array<Shanginn\TelegramBotApiBindings\Types\GameHighScore>"]
        );
    }
}
