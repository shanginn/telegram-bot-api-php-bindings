<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 */
class Animation implements TypeInterface
{
    /**
     * @param string         $fileId       Identifier for this file, which can be used to download or reuse the file
     * @param string         $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int            $width        Video width as defined by sender
     * @param int            $height       Video height as defined by sender
     * @param int            $duration     Duration of the video in seconds as defined by sender
     * @param PhotoSize|null $thumbnail    Optional. Animation thumbnail as defined by sender
     * @param string|null    $fileName     Optional. Original animation filename as defined by sender
     * @param string|null    $mimeType     Optional. MIME type of the file as defined by sender
     * @param int|null       $fileSize     Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
     */
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $width,
        public int $height,
        public int $duration,
        public ?PhotoSize $thumbnail = null,
        public ?string $fileName = null,
        public ?string $mimeType = null,
        public ?int $fileSize = null,
    ) {
    }
}
