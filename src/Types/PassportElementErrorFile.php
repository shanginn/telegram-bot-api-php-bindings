<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue with a document scan. The error is considered resolved when the file with the document scan changes.
 */
class PassportElementErrorFile extends PassportElementError
{
	/**
	 * @param string $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
	 * @param string $fileHash Base64-encoded file hash
	 * @param string $message Error message
	 * @param string $source Error source, must be file
	 */
	public function __construct(
		public string $type,
		public string $fileHash,
		public string $message,
		public string $source = 'file',
	) {
	}
}
