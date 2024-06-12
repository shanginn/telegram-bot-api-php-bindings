<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The background is a gradient fill.
 */
class BackgroundFillGradient extends BackgroundFill
{
    /**
     * @param string $type          Type of the background fill, always “gradient”
     * @param int    $topColor      Top color of the gradient in the RGB24 format
     * @param int    $bottomColor   Bottom color of the gradient in the RGB24 format
     * @param int    $rotationAngle Clockwise rotation angle of the background fill in degrees; 0-359
     */
    public function __construct(
        public string $type,
        public int $topColor,
        public int $bottomColor,
        public int $rotationAngle,
    ) {
    }
}
