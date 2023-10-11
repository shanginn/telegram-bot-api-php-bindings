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
}
