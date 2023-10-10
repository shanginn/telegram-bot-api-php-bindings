<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue with one of the files that constitute the translation of a document. The error is considered resolved when the file changes.
 */
class PassportElementErrorTranslationFile extends PassportElementError
{
	/**
	 * @param string $type Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
	 * @param string $fileHash Base64-encoded file hash
	 * @param string $message Error message
	 * @param string $source Error source, must be translation_file
	 */
	public function __construct(
		public string $type,
		public string $fileHash,
		public string $message,
		public string $source = 'translation_file',
	) {
	}
}
