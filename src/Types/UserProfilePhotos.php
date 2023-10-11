<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represent a user's profile pictures.
 */
class UserProfilePhotos implements TypeInterface
{
    /**
     * @param int                     $totalCount Total number of profile pictures the target user has
     * @param array<array<PhotoSize>> $photos     Requested profile pictures (in up to 4 sizes each)
     */
    public function __construct(
        public int $totalCount,
        public array $photos,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'total_count',
            'photos',
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
            totalCount: $result['total_count'],
            photos: $result['photos'],
        );
    }
}
