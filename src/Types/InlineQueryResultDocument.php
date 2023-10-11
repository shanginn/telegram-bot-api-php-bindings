<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file. Currently, only .PDF and .ZIP files can be sent using this method.
 */
class InlineQueryResultDocument extends InlineQueryResult
{
    /**
     * @param string                    $id                  Unique identifier for this result, 1-64 bytes
     * @param string                    $title               Title for the result
     * @param string                    $documentUrl         A valid URL for the file
     * @param string                    $mimeType            MIME type of the content of the file, either “application/pdf” or “application/zip”
     * @param string                    $type                Type of the result, must be document
     * @param string|null               $caption             Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
     * @param string|null               $parseMode           Optional. Mode for parsing entities in the document caption. See formatting options for more details.
     * @param array<MessageEntity>|null $captionEntities     Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param string|null               $description         Optional. Short description of the result
     * @param InlineKeyboardMarkup|null $replyMarkup         Optional. Inline keyboard attached to the message
     * @param InputMessageContent|null  $inputMessageContent Optional. Content of the message to be sent instead of the file
     * @param string|null               $thumbnailUrl        Optional. URL of the thumbnail (JPEG only) for the file
     * @param int|null                  $thumbnailWidth      Optional. Thumbnail width
     * @param int|null                  $thumbnailHeight     Optional. Thumbnail height
     */
    public function __construct(
        public string $id,
        public string $title,
        public string $documentUrl,
        public string $mimeType,
        public string $type = 'document',
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?string $description = null,
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
        public ?string $thumbnailUrl = null,
        public ?int $thumbnailWidth = null,
        public ?int $thumbnailHeight = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'id',
            'title',
            'document_url',
            'mime_type',
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
            title: $result['title'],
            documentUrl: $result['document_url'],
            mimeType: $result['mime_type'],
            type: $result['type'] ?? 'document',
            caption: $result['caption'] ?? null,
            parseMode: $result['parse_mode'] ?? null,
            captionEntities: $result['caption_entities'] ?? null,
            description: $result['description'] ?? null,
            replyMarkup: $result['reply_markup'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup::fromResponseResult($result['reply_markup'])
                : null,
            inputMessageContent: $result['input_message_content'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InputMessageContent::fromResponseResult($result['input_message_content'])
                : null,
            thumbnailUrl: $result['thumbnail_url'] ?? null,
            thumbnailWidth: $result['thumbnail_width'] ?? null,
            thumbnailHeight: $result['thumbnail_height'] ?? null,
        );
    }
}
