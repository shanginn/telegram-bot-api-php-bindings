<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The background is filled using the selected color.
 */
class BackgroundFillSolid extends BackgroundFill
{
    /**
     * @param string $type  Type of the background fill, always “solid”
     * @param int    $color The color of the background fill in the RGB24 format
     */
    public function __construct(
        public string $type,
        public int $color,
    ) {
    }
}
