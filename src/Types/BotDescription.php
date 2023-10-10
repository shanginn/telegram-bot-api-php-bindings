<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents the bot's description.
 */
class BotDescription implements TypeInterface
{
	/**
	 * @param string $description The bot's description
	 */
	public function __construct(
		public string $description,
	) {
	}
}
