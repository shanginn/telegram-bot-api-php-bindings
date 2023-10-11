<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to a sticker stored on the Telegram servers. By default, this sticker will be sent by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the sticker.
 */
class InlineQueryResultCachedSticker extends InlineQueryResult
{
    /**
     * @param string                    $id                  Unique identifier for this result, 1-64 bytes
     * @param string                    $stickerFileId       A valid file identifier of the sticker
     * @param string                    $type                Type of the result, must be sticker
     * @param InlineKeyboardMarkup|null $replyMarkup         Optional. Inline keyboard attached to the message
     * @param InputMessageContent|null  $inputMessageContent Optional. Content of the message to be sent instead of the sticker
     */
    public function __construct(
        public string $id,
        public string $stickerFileId,
        public string $type = 'sticker',
        public ?InlineKeyboardMarkup $replyMarkup = null,
        public ?InputMessageContent $inputMessageContent = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'id',
            'sticker_file_id',
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
            stickerFileId: $result['sticker_file_id'],
            type: $result['type'] ?? 'sticker',
            replyMarkup: $result['reply_markup'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup::fromResponseResult($result['reply_markup'])
                : null,
            inputMessageContent: $result['input_message_content'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InputMessageContent::fromResponseResult($result['input_message_content'])
                : null,
        );
    }
}
