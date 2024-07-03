<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains full information about a chat.
 */
class ChatFullInfo implements TypeInterface
{
    /**
     * @param int                       $id                                 Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param string                    $type                               Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
     * @param int                       $accentColorId                      Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header, and link preview. See accent colors for more details.
     * @param int                       $maxReactionCount                   The maximum number of reactions that can be set on a message in the chat
     * @param string|null               $title                              Optional. Title, for supergroups, channels and group chats
     * @param string|null               $username                           Optional. Username, for private chats, supergroups and channels if available
     * @param string|null               $firstName                          Optional. First name of the other party in a private chat
     * @param string|null               $lastName                           Optional. Last name of the other party in a private chat
     * @param bool|null                 $isForum                            Optional. True, if the supergroup chat is a forum (has topics enabled)
     * @param ChatPhoto|null            $photo                              Optional. Chat photo
     * @param array<string>|null        $activeUsernames                    Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels
     * @param Birthdate|null            $birthdate                          Optional. For private chats, the date of birth of the user
     * @param BusinessIntro|null        $businessIntro                      Optional. For private chats with business accounts, the intro of the business
     * @param BusinessLocation|null     $businessLocation                   Optional. For private chats with business accounts, the location of the business
     * @param BusinessOpeningHours|null $businessOpeningHours               Optional. For private chats with business accounts, the opening hours of the business
     * @param Chat|null                 $personalChat                       Optional. For private chats, the personal channel of the user
     * @param array<ReactionType>|null  $availableReactions                 Optional. List of available reactions allowed in the chat. If omitted, then all emoji reactions are allowed.
     * @param string|null               $backgroundCustomEmojiId            Optional. Custom emoji identifier of the emoji chosen by the chat for the reply header and link preview background
     * @param int|null                  $profileAccentColorId               Optional. Identifier of the accent color for the chat's profile background. See profile accent colors for more details.
     * @param string|null               $profileBackgroundCustomEmojiId     Optional. Custom emoji identifier of the emoji chosen by the chat for its profile background
     * @param string|null               $emojiStatusCustomEmojiId           Optional. Custom emoji identifier of the emoji status of the chat or the other party in a private chat
     * @param int|null                  $emojiStatusExpirationDate          Optional. Expiration date of the emoji status of the chat or the other party in a private chat, in Unix time, if any
     * @param string|null               $bio                                Optional. Bio of the other party in a private chat
     * @param bool|null                 $hasPrivateForwards                 Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user
     * @param bool|null                 $hasRestrictedVoiceAndVideoMessages Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat
     * @param bool|null                 $joinToSendMessages                 Optional. True, if users need to join the supergroup before they can send messages
     * @param bool|null                 $joinByRequest                      Optional. True, if all users directly joining the supergroup without using an invite link need to be approved by supergroup administrators
     * @param string|null               $description                        Optional. Description, for groups, supergroups and channel chats
     * @param string|null               $inviteLink                         Optional. Primary invite link, for groups, supergroups and channel chats
     * @param Message|null              $pinnedMessage                      Optional. The most recent pinned message (by sending date)
     * @param ChatPermissions|null      $permissions                        Optional. Default chat member permissions, for groups and supergroups
     * @param bool|null                 $canSendPaidMedia                   Optional. True, if paid media messages can be sent or forwarded to the channel chat. The field is available only for channel chats.
     * @param int|null                  $slowModeDelay                      Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unprivileged user; in seconds
     * @param int|null                  $unrestrictBoostCount               Optional. For supergroups, the minimum number of boosts that a non-administrator user needs to add in order to ignore slow mode and chat permissions
     * @param int|null                  $messageAutoDeleteTime              Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds
     * @param bool|null                 $hasAggressiveAntiSpamEnabled       Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators.
     * @param bool|null                 $hasHiddenMembers                   Optional. True, if non-administrators can only get the list of bots and administrators in the chat
     * @param bool|null                 $hasProtectedContent                Optional. True, if messages from the chat can't be forwarded to other chats
     * @param bool|null                 $hasVisibleHistory                  Optional. True, if new chat members will have access to old messages; available only to chat administrators
     * @param string|null               $stickerSetName                     Optional. For supergroups, name of the group sticker set
     * @param bool|null                 $canSetStickerSet                   Optional. True, if the bot can change the group sticker set
     * @param string|null               $customEmojiStickerSetName          Optional. For supergroups, the name of the group's custom emoji sticker set. Custom emoji from this set can be used by all users and bots in the group.
     * @param int|null                  $linkedChatId                       Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     * @param ChatLocation|null         $location                           Optional. For supergroups, the location to which the supergroup is connected
     */
    public function __construct(
        public int $id,
        public string $type,
        public int $accentColorId,
        public int $maxReactionCount,
        public ?string $title = null,
        public ?string $username = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?bool $isForum = null,
        public ?ChatPhoto $photo = null,
        public ?array $activeUsernames = null,
        public ?Birthdate $birthdate = null,
        public ?BusinessIntro $businessIntro = null,
        public ?BusinessLocation $businessLocation = null,
        public ?BusinessOpeningHours $businessOpeningHours = null,
        public ?Chat $personalChat = null,
        public ?array $availableReactions = null,
        public ?string $backgroundCustomEmojiId = null,
        public ?int $profileAccentColorId = null,
        public ?string $profileBackgroundCustomEmojiId = null,
        public ?string $emojiStatusCustomEmojiId = null,
        public ?int $emojiStatusExpirationDate = null,
        public ?string $bio = null,
        public ?bool $hasPrivateForwards = null,
        public ?bool $hasRestrictedVoiceAndVideoMessages = null,
        public ?bool $joinToSendMessages = null,
        public ?bool $joinByRequest = null,
        public ?string $description = null,
        public ?string $inviteLink = null,
        public ?Message $pinnedMessage = null,
        public ?ChatPermissions $permissions = null,
        public ?bool $canSendPaidMedia = null,
        public ?int $slowModeDelay = null,
        public ?int $unrestrictBoostCount = null,
        public ?int $messageAutoDeleteTime = null,
        public ?bool $hasAggressiveAntiSpamEnabled = null,
        public ?bool $hasHiddenMembers = null,
        public ?bool $hasProtectedContent = null,
        public ?bool $hasVisibleHistory = null,
        public ?string $stickerSetName = null,
        public ?bool $canSetStickerSet = null,
        public ?string $customEmojiStickerSetName = null,
        public ?int $linkedChatId = null,
        public ?ChatLocation $location = null,
    ) {
    }
}
