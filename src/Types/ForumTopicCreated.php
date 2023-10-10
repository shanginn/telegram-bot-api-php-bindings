<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a new forum topic created in the chat.
 */
class ForumTopicCreated implements TypeInterface
{
	/**
	 * @param string $name Name of the topic
	 * @param int $iconColor Color of the topic icon in RGB format
	 * @param string|null $iconCustomEmojiId Optional. Unique identifier of the custom emoji shown as the topic icon
	 */
	public function __construct(
		public string $name,
		public int $iconColor,
		public ?string $iconCustomEmojiId = null,
	) {
	}
}
