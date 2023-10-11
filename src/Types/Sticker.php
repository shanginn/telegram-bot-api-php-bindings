<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a sticker.
 */
class Sticker implements TypeInterface
{
    /**
     * @param string            $fileId           Identifier for this file, which can be used to download or reuse the file
     * @param string            $fileUniqueId     Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param string            $type             Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
     * @param int               $width            Sticker width
     * @param int               $height           Sticker height
     * @param bool              $isAnimated       True, if the sticker is animated
     * @param bool              $isVideo          True, if the sticker is a video sticker
     * @param PhotoSize|null    $thumbnail        Optional. Sticker thumbnail in the .WEBP or .JPG format
     * @param string|null       $emoji            Optional. Emoji associated with the sticker
     * @param string|null       $setName          Optional. Name of the sticker set to which the sticker belongs
     * @param File|null         $premiumAnimation Optional. For premium regular stickers, premium animation for the sticker
     * @param MaskPosition|null $maskPosition     Optional. For mask stickers, the position where the mask should be placed
     * @param string|null       $customEmojiId    Optional. For custom emoji stickers, unique identifier of the custom emoji
     * @param bool|null         $needsRepainting  Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
     * @param int|null          $fileSize         Optional. File size in bytes
     */
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public string $type,
        public int $width,
        public int $height,
        public bool $isAnimated,
        public bool $isVideo,
        public ?PhotoSize $thumbnail = null,
        public ?string $emoji = null,
        public ?string $setName = null,
        public ?File $premiumAnimation = null,
        public ?MaskPosition $maskPosition = null,
        public ?string $customEmojiId = null,
        public ?bool $needsRepainting = true,
        public ?int $fileSize = null,
    ) {
    }
}
