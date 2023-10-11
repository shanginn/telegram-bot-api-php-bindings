<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 */
class InlineQueryResultGif extends InlineQueryResult
{
    /**
     * @param string                    $id                  Unique identifier for this result, 1-64 bytes
     * @param string                    $gifUrl              A valid URL for the GIF file. File size must not exceed 1MB
     * @param string                    $thumbnailUrl        URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     * @param string                    $type                Type of the result, must be gif
     * @param int|null                  $gifWidth            Optional. Width of the GIF
     * @param int|null                  $gifHeight           Optional. Height of the GIF
     * @param int|null                  $gifDuration         Optional. Duration of the GIF in seconds
     * @param string|null               $thumbnailMimeType   Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
     * @param string|null               $title               Optional. Title for the result
     * @param string|null               $caption             Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
     * @param string|null               $parseMode           Optional. Mode for parsing entities in the caption. See formatting options for more details.
     * @param array<MessageEntity>|null $captionEntities     Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param InlineKeyboardMarkup|null $replyMarkup         Optional. Inline keyboard attached to the message
     * @param InputMessageContent|null  $inputMessageContent Optional. Content of the message to be sent instead of the GIF animation
     */
    public function __construct(
        public string $id,
        public string $gifUrl,
        public string $thumbnailUrl,
        public string $type = 'gif',
        public ?int $gifWidth = null,
        public ?int $gifHeight = null,
        public ?int $gifDuration = null,
        public ?string $thumbnailMimeType = 'image/jpeg',
        public ?string $title = null,
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
    ) {
    }
}
