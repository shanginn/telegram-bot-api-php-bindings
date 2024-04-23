<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a sticker set.
 */
class StickerSet implements TypeInterface
{
    /**
     * @param string         $name        Sticker set name
     * @param string         $title       Sticker set title
     * @param string         $stickerType Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
     * @param array<Sticker> $stickers    List of all set stickers
     * @param PhotoSize|null $thumbnail   Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
     */
    public function __construct(
        public string $name,
        public string $title,
        public string $stickerType,
        public array $stickers,
        public ?PhotoSize $thumbnail = null,
    ) {
    }
}
