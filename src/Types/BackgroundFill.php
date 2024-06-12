<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the way a background is filled based on the selected colors. Currently, it can be one of.
 *
 * @see BackgroundFillSolid
 * @see BackgroundFillGradient
 * @see BackgroundFillFreeformGradient
 */
abstract class BackgroundFill implements TypeInterface
{
    public function __construct()
    {
    }
}
