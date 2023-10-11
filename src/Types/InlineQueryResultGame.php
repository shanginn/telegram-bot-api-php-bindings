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

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'id',
            'game_short_name',
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
            id: $result['id'],
            gameShortName: $result['game_short_name'],
            type: $result['type'] ?? 'game',
            replyMarkup: $result['reply_markup'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup::fromResponseResult($result['reply_markup'])
                : null,
        );
    }
}
