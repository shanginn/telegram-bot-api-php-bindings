<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a voice note.
 */
class Voice implements TypeInterface
{
    /**
     * @param string      $fileId       Identifier for this file, which can be used to download or reuse the file
     * @param string      $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int         $duration     Duration of the audio in seconds as defined by sender
     * @param string|null $mimeType     Optional. MIME type of the file as defined by sender
     * @param int|null    $fileSize     Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
     */
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $duration,
        public ?string $mimeType = null,
        public ?int $fileSize = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
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
            duration: $result['duration'],
            mimeType: $result['mime_type'] ?? null,
            fileSize: $result['file_size'] ?? null,
        );
    }
}
