<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue with the translated version of a document. The error is considered resolved when a file with the document translation change.
 */
class PassportElementErrorTranslationFiles extends PassportElementError
{
    /**
     * @param string        $type       Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param array<string> $fileHashes List of base64-encoded file hashes
     * @param string        $message    Error message
     * @param string        $source     Error source, must be translation_files
     */
    public function __construct(
        public string $type,
        public array $fileHashes,
        public string $message,
        public string $source = 'translation_files',
    ) {
    }
}
