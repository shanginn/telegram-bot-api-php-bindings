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
     */
    public function __construct(
        public int $id,
        public bool $isBot,
        public string $firstName,
        public ?string $lastName = null,
        public ?string $username = null,
        public ?string $languageCode = null,
        public ?bool $isPremium = true,
        public ?bool $addedToAttachmentMenu = true,
        public ?bool $canJoinGroups = null,
        public ?bool $canReadAllGroupMessages = null,
        public ?bool $supportsInlineQueries = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'id',
            'is_bot',
            'first_name',
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
            id: $result['id'],
            isBot: $result['is_bot'],
            firstName: $result['first_name'],
            lastName: $result['last_name'] ?? null,
            username: $result['username'] ?? null,
            languageCode: $result['language_code'] ?? null,
            isPremium: $result['is_premium'] ?? true,
            addedToAttachmentMenu: $result['added_to_attachment_menu'] ?? true,
            canJoinGroups: $result['can_join_groups'] ?? null,
            canReadAllGroupMessages: $result['can_read_all_group_messages'] ?? null,
            supportsInlineQueries: $result['supports_inline_queries'] ?? null,
        );
    }
}
