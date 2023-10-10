<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue with the reverse side of a document. The error is considered resolved when the file with reverse side of the document changes.
 */
class PassportElementErrorReverseSide extends PassportElementError
{
	/**
	 * @param string $type The section of the user's Telegram Passport which has the issue, one of “driver_license”, “identity_card”
	 * @param string $fileHash Base64-encoded hash of the file with the reverse side of the document
	 * @param string $message Error message
	 * @param string $source Error source, must be reverse_side
	 */
	public function __construct(
		public string $type,
		public string $fileHash,
		public string $message,
		public string $source = 'reverse_side',
	) {
	}
}
