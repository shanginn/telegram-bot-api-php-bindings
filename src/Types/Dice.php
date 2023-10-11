<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents an animated emoji that displays a random value.
 */
class Dice implements TypeInterface
{
    /**
     * @param string $emoji Emoji on which the dice throw animation is based
     * @param int    $value Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji
     */
    public function __construct(
        public string $emoji,
        public int $value,
    ) {
    }
}
