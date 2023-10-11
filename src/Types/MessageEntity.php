<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 */
class MessageEntity implements TypeInterface
{
    /**
     * @param string      $type          Type of the entity. Currently, can be “mention” (@username), “hashtag” (#hashtag), “cashtag” ($USD), “bot_command” (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org), “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text), “underline” (underlined text), “strikethrough” (strikethrough text), “spoiler” (spoiler message), “code” (monowidth string), “pre” (monowidth block), “text_link” (for clickable text URLs), “text_mention” (for users without usernames), “custom_emoji” (for inline custom emoji stickers)
     * @param int         $offset        Offset in UTF-16 code units to the start of the entity
     * @param int         $length        Length of the entity in UTF-16 code units
     * @param string|null $url           Optional. For “text_link” only, URL that will be opened after user taps on the text
     * @param User|null   $user          Optional. For “text_mention” only, the mentioned user
     * @param string|null $language      Optional. For “pre” only, the programming language of the entity text
     * @param string|null $customEmojiId Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker
     */
    public function __construct(
        public string $type,
        public int $offset,
        public int $length,
        public ?string $url = null,
        public ?User $user = null,
        public ?string $language = null,
        public ?string $customEmojiId = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
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

        return new self(
            type: $result['type'],
            offset: $result['offset'],
            length: $result['length'],
            url: $result['url'] ?? null,
            user: $result['user'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['user'])
                : null,
            language: $result['language'] ?? null,
            customEmojiId: $result['custom_emoji_id'] ?? null,
        );
    }
}
