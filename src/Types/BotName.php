<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents the bot's name.
 */
class BotName implements TypeInterface
{
	/**
	 * @param string $name The bot's name
	 */
	public function __construct(
		public string $name,
	) {
	}
}
