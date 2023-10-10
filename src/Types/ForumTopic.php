<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a forum topic.
 */
class ForumTopic implements TypeInterface
{
	/**
	 * @param int $messageThreadId Unique identifier of the forum topic
	 * @param string $name Name of the topic
	 * @param int $iconColor Color of the topic icon in RGB format
	 * @param string|null $iconCustomEmojiId Optional. Unique identifier of the custom emoji shown as the topic icon
	 */
	public function __construct(
		public int $messageThreadId,
		public string $name,
		public int $iconColor,
		public ?string $iconCustomEmojiId = null,
	) {
	}
}
