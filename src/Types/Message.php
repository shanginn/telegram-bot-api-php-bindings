<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a message.
 */
class Message implements TypeInterface
{
	/**
	 * @param int $messageId Unique message identifier inside this chat
	 * @param int $date Date the message was sent in Unix time
	 * @param Chat $chat Conversation the message belongs to
	 * @param int|null $messageThreadId Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
	 * @param User|null $from Optional. Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
	 * @param Chat|null $senderChat Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the supergroup itself for messages from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group. For backward compatibility, the field from contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
	 * @param User|null $forwardFrom Optional. For forwarded messages, sender of the original message
	 * @param Chat|null $forwardFromChat Optional. For messages forwarded from channels or from anonymous administrators, information about the original sender chat
	 * @param int|null $forwardFromMessageId Optional. For messages forwarded from channels, identifier of the original message in the channel
	 * @param string|null $forwardSignature Optional. For forwarded messages that were originally sent in channels or by an anonymous chat administrator, signature of the message sender if present
	 * @param string|null $forwardSenderName Optional. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages
	 * @param int|null $forwardDate Optional. For forwarded messages, date the original message was sent in Unix time
	 * @param bool|null $isTopicMessage Optional. True, if the message is sent to a forum topic
	 * @param bool|null $isAutomaticForward Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
	 * @param Message|null $replyToMessage Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
	 * @param User|null $viaBot Optional. Bot through which the message was sent
	 * @param int|null $editDate Optional. Date the message was last edited in Unix time
	 * @param bool|null $hasProtectedContent Optional. True, if the message can't be forwarded
	 * @param string|null $mediaGroupId Optional. The unique identifier of a media message group this message belongs to
	 * @param string|null $authorSignature Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
	 * @param string|null $text Optional. For text messages, the actual UTF-8 text of the message
	 * @param array<MessageEntity>|null $entities Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
	 * @param Animation|null $animation Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
	 * @param Audio|null $audio Optional. Message is an audio file, information about the file
	 * @param Document|null $document Optional. Message is a general file, information about the file
	 * @param array<PhotoSize>|null $photo Optional. Message is a photo, available sizes of the photo
	 * @param Sticker|null $sticker Optional. Message is a sticker, information about the sticker
	 * @param Story|null $story Optional. Message is a forwarded story
	 * @param Video|null $video Optional. Message is a video, information about the video
	 * @param VideoNote|null $videoNote Optional. Message is a video note, information about the video message
	 * @param Voice|null $voice Optional. Message is a voice message, information about the file
	 * @param string|null $caption Optional. Caption for the animation, audio, document, photo, video or voice
	 * @param array<MessageEntity>|null $captionEntities Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
	 * @param bool|null $hasMediaSpoiler Optional. True, if the message media is covered by a spoiler animation
	 * @param Contact|null $contact Optional. Message is a shared contact, information about the contact
	 * @param Dice|null $dice Optional. Message is a dice with random value
	 * @param Game|null $game Optional. Message is a game, information about the game. More about games »
	 * @param Poll|null $poll Optional. Message is a native poll, information about the poll
	 * @param Venue|null $venue Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
	 * @param Location|null $location Optional. Message is a shared location, information about the location
	 * @param array<User>|null $newChatMembers Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
	 * @param User|null $leftChatMember Optional. A member was removed from the group, information about them (this member may be the bot itself)
	 * @param string|null $newChatTitle Optional. A chat title was changed to this value
	 * @param array<PhotoSize>|null $newChatPhoto Optional. A chat photo was change to this value
	 * @param bool|null $deleteChatPhoto Optional. Service message: the chat photo was deleted
	 * @param bool|null $groupChatCreated Optional. Service message: the group has been created
	 * @param bool|null $supergroupChatCreated Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
	 * @param bool|null $channelChatCreated Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
	 * @param MessageAutoDeleteTimerChanged|null $messageAutoDeleteTimerChanged Optional. Service message: auto-delete timer settings changed in the chat
	 * @param int|null $migrateToChatId Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
	 * @param int|null $migrateFromChatId Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
	 * @param Message|null $pinnedMessage Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
	 * @param Invoice|null $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments »
	 * @param SuccessfulPayment|null $successfulPayment Optional. Message is a service message about a successful payment, information about the payment. More about payments »
	 * @param UserShared|null $userShared Optional. Service message: a user was shared with the bot
	 * @param ChatShared|null $chatShared Optional. Service message: a chat was shared with the bot
	 * @param string|null $connectedWebsite Optional. The domain name of the website on which the user has logged in. More about Telegram Login »
	 * @param WriteAccessAllowed|null $writeAccessAllowed Optional. Service message: the user allowed the bot to write messages after adding it to the attachment or side menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess
	 * @param PassportData|null $passportData Optional. Telegram Passport data
	 * @param ProximityAlertTriggered|null $proximityAlertTriggered Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
	 * @param ForumTopicCreated|null $forumTopicCreated Optional. Service message: forum topic created
	 * @param ForumTopicEdited|null $forumTopicEdited Optional. Service message: forum topic edited
	 * @param ForumTopicClosed|null $forumTopicClosed Optional. Service message: forum topic closed
	 * @param ForumTopicReopened|null $forumTopicReopened Optional. Service message: forum topic reopened
	 * @param GeneralForumTopicHidden|null $generalForumTopicHidden Optional. Service message: the 'General' forum topic hidden
	 * @param GeneralForumTopicUnhidden|null $generalForumTopicUnhidden Optional. Service message: the 'General' forum topic unhidden
	 * @param VideoChatScheduled|null $videoChatScheduled Optional. Service message: video chat scheduled
	 * @param VideoChatStarted|null $videoChatStarted Optional. Service message: video chat started
	 * @param VideoChatEnded|null $videoChatEnded Optional. Service message: video chat ended
	 * @param VideoChatParticipantsInvited|null $videoChatParticipantsInvited Optional. Service message: new participants invited to a video chat
	 * @param WebAppData|null $webAppData Optional. Service message: data sent by a Web App
	 * @param InlineKeyboardMarkup|null $replyMarkup Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
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
}
