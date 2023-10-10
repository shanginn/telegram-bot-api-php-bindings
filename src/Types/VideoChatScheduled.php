<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 */
class VideoChatScheduled implements TypeInterface
{
	/**
	 * @param int $startDate Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
	 */
	public function __construct(
		public int $startDate,
	) {
	}
}
