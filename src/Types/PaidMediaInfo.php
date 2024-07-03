<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes the paid media added to a message.
 */
class PaidMediaInfo implements TypeInterface
{
    /**
     * @param int              $starCount The number of Telegram Stars that must be paid to buy access to the media
     * @param array<PaidMedia> $paidMedia Information about the paid media
     */
    public function __construct(
        public int $starCount,
        public array $paidMedia,
    ) {
    }
}
