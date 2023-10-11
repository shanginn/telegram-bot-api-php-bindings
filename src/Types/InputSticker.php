<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes a sticker to be added to a sticker set.
 */
class InputSticker implements TypeInterface
{
    /**
     * @param InputFile|string   $sticker      The added sticker. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, upload a new one using multipart/form-data, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. Animated and video stickers can't be uploaded via HTTP URL. More information on Sending Files »
     * @param array<string>      $emojiList    List of 1-20 emoji associated with the sticker
     * @param MaskPosition|null  $maskPosition Optional. Position where the mask should be placed on faces. For “mask” stickers only.
     * @param array<string>|null $keywords     Optional. List of 0-20 search keywords for the sticker with total length of up to 64 characters. For “regular” and “custom_emoji” stickers only.
     */
    public function __construct(
        public InputFile|string $sticker,
        public array $emojiList,
        public ?MaskPosition $maskPosition = null,
        public ?array $keywords = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'sticker',
            'emoji_list',
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
            sticker: \Shanginn\TelegramBotApiBindings\Types\InputFile | string::fromResponseResult($result['sticker']),
            emojiList: $result['emoji_list'],
            maskPosition: $result['mask_position'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\MaskPosition::fromResponseResult($result['mask_position'])
                : null,
            keywords: $result['keywords'] ?? null,
        );
    }
}
