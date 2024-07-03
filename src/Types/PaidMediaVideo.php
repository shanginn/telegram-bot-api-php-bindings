<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The paid media is a video.
 */
class PaidMediaVideo extends PaidMedia
{
    /**
     * @param string $type  Type of the paid media, always “video”
     * @param Video  $video The video
     */
    public function __construct(
        public string $type,
        public Video $video,
    ) {
    }
}
