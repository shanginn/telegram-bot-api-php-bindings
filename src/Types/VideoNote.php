<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 */
class VideoNote implements TypeInterface
{
    /**
     * @param string         $fileId       Identifier for this file, which can be used to download or reuse the file
     * @param string         $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int            $length       Video width and height (diameter of the video message) as defined by sender
     * @param int            $duration     Duration of the video in seconds as defined by sender
     * @param PhotoSize|null $thumbnail    Optional. Video thumbnail
     * @param int|null       $fileSize     Optional. File size in bytes
     */
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $length,
        public int $duration,
        public ?PhotoSize $thumbnail = null,
        public ?int $fileSize = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'length',
            'duration',
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
            fileId: $result['file_id'],
            fileUniqueId: $result['file_unique_id'],
            length: $result['length'],
            duration: $result['duration'],
            thumbnail: ($result['thumbnail'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\PhotoSize::fromResponseResult($result['thumbnail'])
                : null,
            fileSize: $result['file_size'] ?? null,
        );
    }
}
