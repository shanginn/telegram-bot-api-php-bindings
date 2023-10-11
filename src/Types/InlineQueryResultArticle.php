<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to an article or web page.
 */
class InlineQueryResultArticle extends InlineQueryResult
{
    /**
     * @param string                    $id                  Unique identifier for this result, 1-64 Bytes
     * @param string                    $title               Title of the result
     * @param InputMessageContent       $inputMessageContent Content of the message to be sent
     * @param string                    $type                Type of the result, must be article
     * @param InlineKeyboardMarkup|null $replyMarkup         Optional. Inline keyboard attached to the message
     * @param string|null               $url                 Optional. URL of the result
     * @param bool|null                 $hideUrl             Optional. Pass True if you don't want the URL to be shown in the message
     * @param string|null               $description         Optional. Short description of the result
     * @param string|null               $thumbnailUrl        Optional. Url of the thumbnail for the result
     * @param int|null                  $thumbnailWidth      Optional. Thumbnail width
     * @param int|null                  $thumbnailHeight     Optional. Thumbnail height
     */
    public function __construct(
        public string $id,
        public string $title,
        public InputMessageContent $inputMessageContent,
        public string $type = 'article',
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?string $url = null,
        public ?bool $hideUrl = null,
        public ?string $description = null,
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
            'input_message_content',
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
            inputMessageContent: \Shanginn\TelegramBotApiBindings\Types\InputMessageContent::fromResponseResult($result['input_message_content']),
            type: $result['type'] ?? 'article',
            replyMarkup: $result['reply_markup'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup::fromResponseResult($result['reply_markup'])
                : null,
            url: $result['url'] ?? null,
            hideUrl: $result['hide_url'] ?? null,
            description: $result['description'] ?? null,
            thumbnailUrl: $result['thumbnail_url'] ?? null,
            thumbnailWidth: $result['thumbnail_width'] ?? null,
            thumbnailHeight: $result['thumbnail_height'] ?? null,
        );
    }
}
