<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a Game.
 */
class InlineQueryResultGame extends InlineQueryResult
{
    /**
     * @param string                    $id            Unique identifier for this result, 1-64 bytes
     * @param string                    $gameShortName Short name of the game
     * @param string                    $type          Type of the result, must be game
     * @param InlineKeyboardMarkup|null $replyMarkup   Optional. Inline keyboard attached to the message
     */
    public function __construct(
        public string $id,
        public string $gameShortName,
        public string $type = 'game',
        public ?InlineKeyboardMarkup $replyMarkup = null,
    ) {
    }
}
