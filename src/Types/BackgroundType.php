<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the type of a background. Currently, it can be one of.
 *
 * @see BackgroundTypeFill
 * @see BackgroundTypeWallpaper
 * @see BackgroundTypePattern
 * @see BackgroundTypeChatTheme
 */
abstract class BackgroundType implements TypeInterface
{
    public function __construct()
    {
    }
}
