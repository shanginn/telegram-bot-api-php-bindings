<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The paid media is a photo.
 */
class PaidMediaPhoto extends PaidMedia
{
    /**
     * @param string           $type  Type of the paid media, always “photo”
     * @param array<PhotoSize> $photo The photo
     */
    public function __construct(
        public string $type,
        public array $photo,
    ) {
    }
}
