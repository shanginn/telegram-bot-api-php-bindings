<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a chat photo.
 */
class ChatPhoto implements TypeInterface
{
    /**
     * @param string $smallFileId       File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
     * @param string $smallFileUniqueId Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param string $bigFileId         File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
     * @param string $bigFileUniqueId   Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     */
    public function __construct(
        public string $smallFileId,
        public string $smallFileUniqueId,
        public string $bigFileId,
        public string $bigFileUniqueId,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'small_file_id',
            'small_file_unique_id',
            'big_file_id',
            'big_file_unique_id',
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
            smallFileId: $result['small_file_id'],
            smallFileUniqueId: $result['small_file_unique_id'],
            bigFileId: $result['big_file_id'],
            bigFileUniqueId: $result['big_file_unique_id'],
        );
    }
}
