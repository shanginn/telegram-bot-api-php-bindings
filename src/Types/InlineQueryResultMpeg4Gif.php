<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 */
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
    /**
     * @param string                    $id                  Unique identifier for this result, 1-64 bytes
     * @param string                    $mpeg4Url            A valid URL for the MPEG4 file. File size must not exceed 1MB
     * @param string                    $thumbnailUrl        URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     * @param string                    $type                Type of the result, must be mpeg4_gif
     * @param int|null                  $mpeg4Width          Optional. Video width
     * @param int|null                  $mpeg4Height         Optional. Video height
     * @param int|null                  $mpeg4Duration       Optional. Video duration in seconds
     * @param string|null               $thumbnailMimeType   Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
     * @param string|null               $title               Optional. Title for the result
     * @param string|null               $caption             Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
     * @param string|null               $parseMode           Optional. Mode for parsing entities in the caption. See formatting options for more details.
     * @param array<MessageEntity>|null $captionEntities     Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param InlineKeyboardMarkup|null $replyMarkup         Optional. Inline keyboard attached to the message
     * @param InputMessageContent|null  $inputMessageContent Optional. Content of the message to be sent instead of the video animation
     */
    public function __construct(
        public string $id,
        public string $mpeg4Url,
        public string $thumbnailUrl,
        public string $type = 'mpeg4_gif',
        public ?int $mpeg4Width = null,
        public ?int $mpeg4Height = null,
        public ?int $mpeg4Duration = null,
        public ?string $thumbnailMimeType = 'image/jpeg',
        public ?string $title = null,
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'id',
            'mpeg4_url',
            'thumbnail_url',
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
            id: $result['id'],
            mpeg4Url: $result['mpeg4_url'],
            thumbnailUrl: $result['thumbnail_url'],
            type: $result['type'] ?? 'mpeg4_gif',
            mpeg4Width: $result['mpeg4_width'] ?? null,
            mpeg4Height: $result['mpeg4_height'] ?? null,
            mpeg4Duration: $result['mpeg4_duration'] ?? null,
            thumbnailMimeType: $result['thumbnail_mime_type'] ?? 'image/jpeg',
            title: $result['title'] ?? null,
            caption: $result['caption'] ?? null,
            parseMode: $result['parse_mode'] ?? null,
            captionEntities: $result['caption_entities'] ?? null,
            replyMarkup: $result['reply_markup'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup::fromResponseResult($result['reply_markup'])
                : null,
            inputMessageContent: $result['input_message_content'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InputMessageContent::fromResponseResult($result['input_message_content'])
                : null,
        );
    }
}
