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
}
