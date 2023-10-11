<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue with one of the files that constitute the translation of a document. The error is considered resolved when the file changes.
 */
class PassportElementErrorTranslationFile extends PassportElementError
{
    /**
     * @param string $type     Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string $fileHash Base64-encoded file hash
     * @param string $message  Error message
     * @param string $source   Error source, must be translation_file
     */
    public function __construct(
        public string $type,
        public string $fileHash,
        public string $message,
        public string $source = 'translation_file',
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'type',
            'file_hash',
            'message',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($result[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            type: $result['type'],
            fileHash: $result['file_hash'],
            message: $result['message'],
            source: $result['source'] ?? 'translation_file',
        );
    }
}
