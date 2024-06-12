<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The background is a freeform gradient that rotates after every message in the chat.
 */
class BackgroundFillFreeformGradient extends BackgroundFill
{
    /**
     * @param string     $type   Type of the background fill, always “freeform_gradient”
     * @param array<int> $colors A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
     */
    public function __construct(
        public string $type,
        public array $colors,
    ) {
    }
}
