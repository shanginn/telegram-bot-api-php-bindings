<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 */
class Audio implements TypeInterface
{
    /**
     * @param string         $fileId       Identifier for this file, which can be used to download or reuse the file
     * @param string         $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int            $duration     Duration of the audio in seconds as defined by sender
     * @param string|null    $performer    Optional. Performer of the audio as defined by sender or by audio tags
     * @param string|null    $title        Optional. Title of the audio as defined by sender or by audio tags
     * @param string|null    $fileName     Optional. Original filename as defined by sender
     * @param string|null    $mimeType     Optional. MIME type of the file as defined by sender
     * @param int|null       $fileSize     Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
     * @param PhotoSize|null $thumbnail    Optional. Thumbnail of the album cover to which the music file belongs
     */
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int $duration,
        public ?string $performer = null,
        public ?string $title = null,
        public ?string $fileName = null,
        public ?string $mimeType = null,
        public ?int $fileSize = null,
        public ?PhotoSize $thumbnail = null,
    ) {
    }
}
