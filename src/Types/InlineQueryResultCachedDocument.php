<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file.
 */
class InlineQueryResultCachedDocument extends InlineQueryResult
{
	/**
	 * @param string $id Unique identifier for this result, 1-64 bytes
	 * @param string $title Title for the result
	 * @param string $documentFileId A valid file identifier for the file
	 * @param string $type Type of the result, must be document
	 * @param string|null $description Optional. Short description of the result
	 * @param string|null $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
	 * @param string|null $parseMode Optional. Mode for parsing entities in the document caption. See formatting options for more details.
	 * @param array<MessageEntity>|null $captionEntities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param InlineKeyboardMarkup|null $replyMarkup Optional. Inline keyboard attached to the message
	 * @param InputMessageContent|null $inputMessageContent Optional. Content of the message to be sent instead of the file
	 */
	public function __construct(
		public string $id,
		public string $title,
		public string $documentFileId,
		public string $type = 'document',
		public ?string $description = null,
		public ?string $caption = null,
		public ?string $parseMode = null,
		public ?array $captionEntities = null,
		public ?InlineKeyboardMarkup $replyMarkup = null,
		public ?InputMessageContent $inputMessageContent = null,
	) {
	}
}
