<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object describes the position on faces where a mask should be placed by default.
 */
class MaskPosition implements TypeInterface
{
    /**
     * @param string $point  The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or “chin”.
     * @param float  $xShift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example, choosing -1.0 will place mask just to the left of the default mask position.
     * @param float  $yShift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0 will place the mask just below the default mask position.
     * @param float  $scale  Mask scaling coefficient. For example, 2.0 means double size.
     */
    public function __construct(
        public string $point,
        public float $xShift,
        public float $yShift,
        public float $scale,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'point',
            'x_shift',
            'y_shift',
            'scale',
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
            point: $result['point'],
            xShift: $result['x_shift'],
            yShift: $result['y_shift'],
            scale: $result['scale'],
        );
    }
}
