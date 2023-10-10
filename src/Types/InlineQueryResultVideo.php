<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be sent by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the video.
 */
class InlineQueryResultVideo extends InlineQueryResult
{
	/**
	 * @param string $id Unique identifier for this result, 1-64 bytes
	 * @param string $videoUrl A valid URL for the embedded video player or video file
	 * @param string $mimeType MIME type of the content of the video URL, “text/html” or “video/mp4”
	 * @param string $thumbnailUrl URL of the thumbnail (JPEG only) for the video
	 * @param string $title Title for the result
	 * @param string $type Type of the result, must be video
	 * @param string|null $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
	 * @param string|null $parseMode Optional. Mode for parsing entities in the video caption. See formatting options for more details.
	 * @param array<MessageEntity>|null $captionEntities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
	 * @param int|null $videoWidth Optional. Video width
	 * @param int|null $videoHeight Optional. Video height
	 * @param int|null $videoDuration Optional. Video duration in seconds
	 * @param string|null $description Optional. Short description of the result
	 * @param InlineKeyboardMarkup|null $replyMarkup Optional. Inline keyboard attached to the message
	 * @param InputMessageContent|null $inputMessageContent Optional. Content of the message to be sent instead of the video. This field is required if InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
	 */
	public function __construct(
		public string $id,
		public string $videoUrl,
		public string $mimeType,
		public string $thumbnailUrl,
		public string $title,
		public string $type = 'video',
		public ?string $caption = null,
		public ?string $parseMode = null,
		public ?array $captionEntities = null,
		public ?int $videoWidth = null,
		public ?int $videoHeight = null,
		public ?int $videoDuration = null,
		public ?string $description = null,
		public ?InlineKeyboardMarkup $replyMarkup = null,
		public ?InputMessageContent $inputMessageContent = null,
	) {
	}
}
