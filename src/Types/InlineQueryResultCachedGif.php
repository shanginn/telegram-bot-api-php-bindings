<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to an animated GIF file stored on the Telegram servers. By default, this animated GIF file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with specified content instead of the animation.
 */
class InlineQueryResultCachedGif extends InlineQueryResult
{
	/**
	 * @param string $id Unique identifier for this result, 1-64 bytes
	 * @param string $gifFileId A valid file identifier for the GIF file
	 * @param string $type Type of the result, must be gif
	 * @param string|null $title Optional. Title for the result
	 * @param string|null $caption Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
	 * @param string|null $parseMode Optional. Mode for parsing entities in the caption. See formatting options for more details.
	 * @param array<MessageEntity>|null $captionEntities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param InlineKeyboardMarkup|null $replyMarkup Optional. Inline keyboard attached to the message
	 * @param InputMessageContent|null $inputMessageContent Optional. Content of the message to be sent instead of the GIF animation
	 */
	public function __construct(
		public string $id,
		public string $gifFileId,
		public string $type = 'gif',
		public ?string $title = null,
		public ?string $caption = null,
		public ?string $parseMode = null,
		public ?array $captionEntities = null,
		public ?InlineKeyboardMarkup $replyMarkup = null,
		public ?InputMessageContent $inputMessageContent = null,
	) {
	}
}
