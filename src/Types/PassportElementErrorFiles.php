<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue with a list of scans. The error is considered resolved when the list of files containing the scans changes.
 */
class PassportElementErrorFiles extends PassportElementError
{
	/**
	 * @param string $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
	 * @param array<string> $fileHashes List of base64-encoded file hashes
	 * @param string $message Error message
	 * @param string $source Error source, must be files
	 */
	public function __construct(
		public string $type,
		public array $fileHashes,
		public string $message,
		public string $source = 'files',
	) {
	}
}
