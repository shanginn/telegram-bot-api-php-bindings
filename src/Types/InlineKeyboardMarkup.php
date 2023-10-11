<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 */
class InlineKeyboardMarkup implements TypeInterface
{
    /**
     * @param array<array<InlineKeyboardButton>> $inlineKeyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
     */
    public function __construct(
        public array $inlineKeyboard,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'inline_keyboard',
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
            inlineKeyboard: $result['inline_keyboard'],
        );
    }
}
