<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 */
class PhotoSize implements TypeInterface
{
    /**
     * @param string   $fileId       Identifier for this file, which can be used to download or reuse the file
     * @param string   $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int      $width        Photo width
     * @param int      $height       Photo height
     * @param int|null $fileSize     Optional. File size in bytes
     */
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $width,
        public int $height,
        public ?int $fileSize = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'width',
            'height',
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
            width: $result['width'],
            height: $result['height'],
            fileSize: $result['file_size'] ?? null,
        );
    }
}
