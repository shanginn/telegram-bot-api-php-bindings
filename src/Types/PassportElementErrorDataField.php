<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the field's value changes.
 */
class PassportElementErrorDataField extends PassportElementError
{
    /**
     * @param string $type      The section of the user's Telegram Passport which has the error, one of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
     * @param string $fieldName Name of the data field which has the error
     * @param string $dataHash  Base64-encoded data hash
     * @param string $message   Error message
     * @param string $source    Error source, must be data
     */
    public function __construct(
        public string $type,
        public string $fieldName,
        public string $dataHash,
        public string $message,
        public string $source = 'data',
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'type',
            'field_name',
            'data_hash',
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
            fieldName: $result['field_name'],
            dataHash: $result['data_hash'],
            message: $result['message'],
            source: $result['source'] ?? 'data',
        );
    }
}
