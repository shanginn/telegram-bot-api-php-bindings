<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The background is a PNG or TGV (gzipped subset of SVG with MIME type “application/x-tgwallpattern”) pattern to be combined with the background fill chosen by the user.
 */
class BackgroundTypePattern extends BackgroundType
{
    /**
     * @param string         $type       Type of the background, always “pattern”
     * @param Document       $document   Document with the pattern
     * @param BackgroundFill $fill       The background fill that is combined with the pattern
     * @param int            $intensity  Intensity of the pattern when it is shown above the filled background; 0-100
     * @param bool|null      $isInverted Optional. True, if the background fill must be applied only to the pattern itself. All other pixels are black in this case. For dark themes only
     * @param bool|null      $isMoving   Optional. True, if the background moves slightly when the device is tilted
     */
    public function __construct(
        public string $type,
        public Document $document,
        public BackgroundFill $fill,
        public int $intensity,
        public ?bool $isInverted = null,
        public ?bool $isMoving = null,
    ) {
    }
}
