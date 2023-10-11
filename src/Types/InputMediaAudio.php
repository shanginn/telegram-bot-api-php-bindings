<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an audio file to be treated as music to be sent.
 */
class InputMediaAudio extends InputMedia
{
    /**
     * @param string                    $media           File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param string                    $type            Type of the result, must be audio
     * @param InputFile|string|null     $thumbnail       Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param string|null               $caption         Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing
     * @param string|null               $parseMode       Optional. Mode for parsing entities in the audio caption. See formatting options for more details.
     * @param array<MessageEntity>|null $captionEntities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param int|null                  $duration        Optional. Duration of the audio in seconds
     * @param string|null               $performer       Optional. Performer of the audio
     * @param string|null               $title           Optional. Title of the audio
     */
    public function __construct(
        public string $media,
        public string $type = 'audio',
        public InputFile|string|null $thumbnail = null,
        public ?string $caption = null,
        public ?string $parseMode = null,
        public ?array $captionEntities = null,
        public ?int $duration = null,
        public ?string $performer = null,
        public ?string $title = null,
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
            type: $result['type'] ?? 'audio',
            thumbnail: $result['thumbnail'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InputFile | string::fromResponseResult($result['thumbnail'])
                : null,
            caption: $result['caption'] ?? null,
            parseMode: $result['parse_mode'] ?? null,
            captionEntities: $result['caption_entities'] ?? null,
            duration: $result['duration'] ?? null,
            performer: $result['performer'] ?? null,
            title: $result['title'] ?? null,
        );
    }
}
