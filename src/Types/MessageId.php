<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a unique message identifier.
 */
class MessageId implements TypeInterface
{
	/**
	 * @param int $messageId Unique message identifier
	 */
	public function __construct(
		public int $messageId,
	) {
	}
}
