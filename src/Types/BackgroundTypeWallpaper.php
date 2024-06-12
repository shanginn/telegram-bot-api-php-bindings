<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The background is a wallpaper in the JPEG format.
 */
class BackgroundTypeWallpaper extends BackgroundType
{
    /**
     * @param string    $type             Type of the background, always “wallpaper”
     * @param Document  $document         Document with the wallpaper
     * @param int       $darkThemeDimming Dimming of the background in dark themes, as a percentage; 0-100
     * @param bool|null $isBlurred        Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12
     * @param bool|null $isMoving         Optional. True, if the background moves slightly when the device is tilted
     */
    public function __construct(
        public string $type,
        public Document $document,
        public int $darkThemeDimming,
        public ?bool $isBlurred = null,
        public ?bool $isMoving = null,
    ) {
    }
}
