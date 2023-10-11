<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
 */
class InputTextMessageContent extends InputMessageContent
{
    /**
     * @param string                    $messageText           Text of the message to be sent, 1-4096 characters
     * @param string|null               $parseMode             Optional. Mode for parsing entities in the message text. See formatting options for more details.
     * @param array<MessageEntity>|null $entities              Optional. List of special entities that appear in message text, which can be specified instead of parse_mode
     * @param bool|null                 $disableWebPagePreview Optional. Disables link previews for links in the sent message
     */
    public function __construct(
        public string $messageText,
        public ?string $parseMode = null,
        public ?array $entities = null,
        public ?bool $disableWebPagePreview = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
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

        return new self(
            messageText: $result['message_text'],
            parseMode: $result['parse_mode'] ?? null,
            entities: $result['entities'] ?? null,
            disableWebPagePreview: $result['disable_web_page_preview'] ?? null,
        );
    }
}
