<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a Telegram user or bot.
 */
class User implements TypeInterface
{
    /**
     * @param int         $id                      Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param bool        $isBot                   True, if this user is a bot
     * @param string      $firstName               User's or bot's first name
     * @param string|null $lastName                Optional. User's or bot's last name
     * @param string|null $username                Optional. User's or bot's username
     * @param string|null $languageCode            Optional. IETF language tag of the user's language
     * @param bool|null   $isPremium               Optional. True, if this user is a Telegram Premium user
     * @param bool|null   $addedToAttachmentMenu   Optional. True, if this user added the bot to the attachment menu
     * @param bool|null   $canJoinGroups           Optional. True, if the bot can be invited to groups. Returned only in getMe.
     * @param bool|null   $canReadAllGroupMessages Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
     * @param bool|null   $supportsInlineQueries   Optional. True, if the bot supports inline queries. Returned only in getMe.
     * @param bool|null   $canConnectToBusiness    Optional. True, if the bot can be connected to a Telegram Business account to receive its messages. Returned only in getMe.
     * @param bool|null   $hasMainWebApp           Optional. True, if the bot has a main Web App. Returned only in getMe.
     */
    public function __construct(
        public int $id,
        public bool $isBot,
        public string $firstName,
        public ?string $lastName = null,
        public ?string $username = null,
        public ?string $languageCode = null,
        public ?bool $isPremium = null,
        public ?bool $addedToAttachmentMenu = null,
        public ?bool $canJoinGroups = null,
        public ?bool $canReadAllGroupMessages = null,
        public ?bool $supportsInlineQueries = null,
        public ?bool $canConnectToBusiness = null,
        public ?bool $hasMainWebApp = null,
    ) {
    }
}
