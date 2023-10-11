<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a photo to be sent.
 */
class InputMediaPhoto extends InputMedia
{
    /**
     * @param string                    $media           File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param string                    $type            Type of the result, must be photo
     * @param string|null               $caption         Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
     * @param string|null               $parseMode       Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
     * @param array<MessageEntity>|null $captionEntities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|null                 $hasSpoiler      Optional. Pass True if the photo needs to be covered with a spoiler animation
     */
    public function __construct(
        public string $media,
        public string $type = 'photo',
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?bool $hasSpoiler = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'media',
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
            media: $result['media'],
            type: $result['type'] ?? 'photo',
            caption: $result['caption'] ?? null,
            parseMode: $result['parse_mode'] ?? null,
            captionEntities: $result['caption_entities'] ?? null,
            hasSpoiler: $result['has_spoiler'] ?? null,
        );
    }
}
