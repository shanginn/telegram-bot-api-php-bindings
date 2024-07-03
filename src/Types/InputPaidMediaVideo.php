<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * The paid media to send is a video.
 */
class InputPaidMediaVideo extends InputPaidMedia
{
    /**
     * @param string                $media             File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param string                $type              Type of the media, must be video
     * @param InputFile|string|null $thumbnail         Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param int|null              $width             Optional. Video width
     * @param int|null              $height            Optional. Video height
     * @param int|null              $duration          Optional. Video duration in seconds
     * @param bool|null             $supportsStreaming Optional. Pass True if the uploaded video is suitable for streaming
     */
    public function __construct(
        public string $media,
        public string $type = 'video',
        public InputFile|string|null $thumbnail = null,
        public ?int $width = null,
        public ?int $height = null,
        public ?int $duration = null,
        public ?bool $supportsStreaming = null,
    ) {
    }
}
