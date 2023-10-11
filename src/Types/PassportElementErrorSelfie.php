<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue with the selfie with a document. The error is considered resolved when the file with the selfie changes.
 */
class PassportElementErrorSelfie extends PassportElementError
{
    /**
     * @param string $type     The section of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport”
     * @param string $fileHash Base64-encoded hash of the file with the selfie
     * @param string $message  Error message
     * @param string $source   Error source, must be selfie
     */
    public function __construct(
        public string $type,
        public string $fileHash,
        public string $message,
        public string $source = 'selfie',
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
            if (!isset($data[$field])) {
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
            source: $result['source'] ?? 'selfie',
        );
    }
}
