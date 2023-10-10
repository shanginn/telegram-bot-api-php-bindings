<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a change in auto-delete timer settings.
 */
class MessageAutoDeleteTimerChanged implements TypeInterface
{
	/**
	 * @param int $messageAutoDeleteTime New auto-delete time for messages in the chat; in seconds
	 */
	public function __construct(
		public int $messageAutoDeleteTime,
	) {
	}
}
