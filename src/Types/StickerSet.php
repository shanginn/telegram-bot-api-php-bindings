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
     * @param bool           $isAnimated  True, if the sticker set contains animated stickers
     * @param bool           $isVideo     True, if the sticker set contains video stickers
     * @param array<Sticker> $stickers    List of all set stickers
     * @param PhotoSize|null $thumbnail   Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
     */
    public function __construct(
        public string $name,
        public string $title,
        public string $stickerType,
        public bool $isAnimated,
        public bool $isVideo,
        public array $stickers,
        public ?PhotoSize $thumbnail = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'name',
            'title',
            'sticker_type',
            'is_animated',
            'is_video',
            'stickers',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($result[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            name: $result['name'],
            title: $result['title'],
            stickerType: $result['sticker_type'],
            isAnimated: $result['is_animated'],
            isVideo: $result['is_video'],
            stickers: $result['stickers'],
            thumbnail: ($result['thumbnail'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\PhotoSize::fromResponseResult($result['thumbnail'])
                : null,
        );
    }
}
