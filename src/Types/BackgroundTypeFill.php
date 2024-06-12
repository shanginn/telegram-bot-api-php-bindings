<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The background is automatically filled based on the selected colors.
 */
class BackgroundTypeFill extends BackgroundType
{
    /**
     * @param string         $type             Type of the background, always “fill”
     * @param BackgroundFill $fill             The background fill
     * @param int            $darkThemeDimming Dimming of the background in dark themes, as a percentage; 0-100
     */
    public function __construct(
        public string $type,
        public BackgroundFill $fill,
        public int $darkThemeDimming,
    ) {
    }
}
