<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The paid media isn't available before the payment.
 */
class PaidMediaPreview extends PaidMedia
{
    /**
     * @param string   $type     Type of the paid media, always “preview”
     * @param int|null $width    Optional. Media width as defined by the sender
     * @param int|null $height   Optional. Media height as defined by the sender
     * @param int|null $duration Optional. Duration of the media in seconds as defined by the sender
     */
    public function __construct(
        public string $type,
        public ?int $width = null,
        public ?int $height = null,
        public ?int $duration = null,
    ) {
    }
}
