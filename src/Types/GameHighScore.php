<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents one row of the high scores table for a game.
 */
class GameHighScore implements TypeInterface
{
	/**
	 * @param int $position Position in high score table for the game
	 * @param User $user User
	 * @param int $score Score
	 */
	public function __construct(
		public int $position,
		public User $user,
		public int $score,
	) {
	}
}
