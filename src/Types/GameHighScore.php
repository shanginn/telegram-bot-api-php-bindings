<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents one row of the high scores table for a game.
 */
class GameHighScore implements TypeInterface
{
    /**
     * @param int  $position Position in high score table for the game
     * @param User $user     User
     * @param int  $score    Score
     */
    public function __construct(
        public int $position,
        public User $user,
        public int $score,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'position',
            'user',
            'score',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            position: $result['position'],
            user: \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['user']),
            score: $result['score'],
        );
    }
}
