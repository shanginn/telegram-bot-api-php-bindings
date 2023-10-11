<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the photo.
 */
class InlineQueryResultPhoto extends InlineQueryResult
{
    /**
     * @param string                    $id                  Unique identifier for this result, 1-64 bytes
     * @param string                    $photoUrl            A valid URL of the photo. Photo must be in JPEG format. Photo size must not exceed 5MB
     * @param string                    $thumbnailUrl        URL of the thumbnail for the photo
     * @param string                    $type                Type of the result, must be photo
     * @param int|null                  $photoWidth          Optional. Width of the photo
     * @param int|null                  $photoHeight         Optional. Height of the photo
     * @param string|null               $title               Optional. Title for the result
     * @param string|null               $description         Optional. Short description of the result
     * @param string|null               $caption             Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
     * @param string|null               $parseMode           Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
     * @param array<MessageEntity>|null $captionEntities     Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param InlineKeyboardMarkup|null $replyMarkup         Optional. Inline keyboard attached to the message
     * @param InputMessageContent|null  $inputMessageContent Optional. Content of the message to be sent instead of the photo
     */
    public function __construct(
        public string $id,
        public string $photoUrl,
        public string $thumbnailUrl,
        public string $type = 'photo',
        public ?int $photoWidth = null,
        public ?int $photoHeight = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
    ) {
    }
}
