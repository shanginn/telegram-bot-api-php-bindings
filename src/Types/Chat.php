<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a chat.
 */
class Chat implements TypeInterface
{
	/**
	 * @param int $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
	 * @param string $type Type of chat, can be either “private”, “group”, “supergroup” or “channel”
	 * @param string|null $title Optional. Title, for supergroups, channels and group chats
	 * @param string|null $username Optional. Username, for private chats, supergroups and channels if available
	 * @param string|null $firstName Optional. First name of the other party in a private chat
	 * @param string|null $lastName Optional. Last name of the other party in a private chat
	 * @param bool|null $isForum Optional. True, if the supergroup chat is a forum (has topics enabled)
	 * @param ChatPhoto|null $photo Optional. Chat photo. Returned only in getChat.
	 * @param array<string>|null $activeUsernames Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. Returned only in getChat.
	 * @param string|null $emojiStatusCustomEmojiId Optional. Custom emoji identifier of emoji status of the other party in a private chat. Returned only in getChat.
	 * @param int|null $emojiStatusExpirationDate Optional. Expiration date of the emoji status of the other party in a private chat in Unix time, if any. Returned only in getChat.
	 * @param string|null $bio Optional. Bio of the other party in a private chat. Returned only in getChat.
	 * @param bool|null $hasPrivateForwards Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user. Returned only in getChat.
	 * @param bool|null $hasRestrictedVoiceAndVideoMessages Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat. Returned only in getChat.
	 * @param bool|null $joinToSendMessages Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat.
	 * @param bool|null $joinByRequest Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned only in getChat.
	 * @param string|null $description Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
	 * @param string|null $inviteLink Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in getChat.
	 * @param Message|null $pinnedMessage Optional. The most recent pinned message (by sending date). Returned only in getChat.
	 * @param ChatPermissions|null $permissions Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
	 * @param int|null $slowModeDelay Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user; in seconds. Returned only in getChat.
	 * @param int|null $messageAutoDeleteTime Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in getChat.
	 * @param bool|null $hasAggressiveAntiSpamEnabled Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators. Returned only in getChat.
	 * @param bool|null $hasHiddenMembers Optional. True, if non-administrators can only get the list of bots and administrators in the chat. Returned only in getChat.
	 * @param bool|null $hasProtectedContent Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat.
	 * @param string|null $stickerSetName Optional. For supergroups, name of group sticker set. Returned only in getChat.
	 * @param bool|null $canSetStickerSet Optional. True, if the bot can change the group sticker set. Returned only in getChat.
	 * @param int|null $linkedChatId Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
	 * @param ChatLocation|null $location Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
	 */
	public function __construct(
		public int $id,
		public string $type,
		public ?string $title = null,
		public ?string $username = null,
		public ?string $firstName = null,
		public ?string $lastName = null,
		public ?bool $isForum = true,
		public ?ChatPhoto $photo = null,
		public ?array $activeUsernames = null,
		public ?string $emojiStatusCustomEmojiId = null,
		public ?int $emojiStatusExpirationDate = null,
		public ?string $bio = null,
		public ?bool $hasPrivateForwards = true,
		public ?bool $hasRestrictedVoiceAndVideoMessages = true,
		public ?bool $joinToSendMessages = true,
		public ?bool $joinByRequest = true,
		public ?string $description = null,
		public ?string $inviteLink = null,
		public ?Message $pinnedMessage = null,
		public ?ChatPermissions $permissions = null,
		public ?int $slowModeDelay = null,
		public ?int $messageAutoDeleteTime = null,
		public ?bool $hasAggressiveAntiSpamEnabled = true,
		public ?bool $hasHiddenMembers = true,
		public ?bool $hasProtectedContent = true,
		public ?string $stickerSetName = null,
		public ?bool $canSetStickerSet = true,
		public ?int $linkedChatId = null,
		public ?ChatLocation $location = null,
	) {
	}
}
