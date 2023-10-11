<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to a video file stored on the Telegram servers. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 */
class InlineQueryResultCachedVideo extends InlineQueryResult
{
    /**
     * @param string                    $id                  Unique identifier for this result, 1-64 bytes
     * @param string                    $videoFileId         A valid file identifier for the video file
     * @param string                    $title               Title for the result
     * @param string                    $type                Type of the result, must be video
     * @param string|null               $description         Optional. Short description of the result
     * @param string|null               $caption             Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
     * @param string|null               $parseMode           Optional. Mode for parsing entities in the video caption. See formatting options for more details.
     * @param array<MessageEntity>|null $captionEntities     Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param InlineKeyboardMarkup|null $replyMarkup         Optional. Inline keyboard attached to the message
     * @param InputMessageContent|null  $inputMessageContent Optional. Content of the message to be sent instead of the video
     */
    public function __construct(
        public string $id,
        public string $videoFileId,
        public string $title,
        public string $type = 'video',
        public ?string $description = null,
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
            'video_file_id',
            'title',
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
            videoFileId: $result['video_file_id'],
            title: $result['title'],
            type: $result['type'] ?? 'video',
            description: $result['description'] ?? null,
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
