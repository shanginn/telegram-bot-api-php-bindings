<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a menu button, which opens the bot's list of commands.
 */
class MenuButtonCommands extends MenuButton
{
	/**
	 * @param string $type Type of the button, must be commands
	 */
	public function __construct(
		public string $type = 'commands',
	) {
	}
}
