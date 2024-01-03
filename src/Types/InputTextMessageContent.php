<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
 */
class InputTextMessageContent extends InputMessageContent
{
    /**
     * @param string                    $messageText        Text of the message to be sent, 1-4096 characters
     * @param string|null               $parseMode          Optional. Mode for parsing entities in the message text. See formatting options for more details.
     * @param array<MessageEntity>|null $entities           Optional. List of special entities that appear in message text, which can be specified instead of parse_mode
     * @param LinkPreviewOptions|null   $linkPreviewOptions Optional. Link preview generation options for the message
     */
    public function __construct(
        public string $messageText,
        public ?string $parseMode = null,
        public ?array $entities = null,
        public ?LinkPreviewOptions $linkPreviewOptions = null,
    ) {
    }
}
