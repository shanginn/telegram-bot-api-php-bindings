<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
 */
class PassportFile implements TypeInterface
{
    /**
     * @param string $fileId       Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int    $fileSize     File size in bytes
     * @param int    $fileDate     Unix time when the file was uploaded
     */
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $fileSize,
        public int $fileDate,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'file_id',
            'file_unique_id',
            'file_size',
            'file_date',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            fileId: $result['file_id'],
            fileUniqueId: $result['file_unique_id'],
            fileSize: $result['file_size'],
            fileDate: $result['file_date'],
        );
    }
}
