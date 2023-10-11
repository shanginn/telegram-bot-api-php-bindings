<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents the content of a contact message to be sent as the result of an inline query.
 */
class InputContactMessageContent extends InputMessageContent
{
    /**
     * @param string      $phoneNumber Contact's phone number
     * @param string      $firstName   Contact's first name
     * @param string|null $lastName    Optional. Contact's last name
     * @param string|null $vcard       Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
     */
    public function __construct(
        public string $phoneNumber,
        public string $firstName,
        public ?string $lastName = null,
        public ?string $vcard = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'phone_number',
            'first_name',
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
            phoneNumber: $result['phone_number'],
            firstName: $result['first_name'],
            lastName: $result['last_name'] ?? null,
            vcard: $result['vcard'] ?? null,
        );
    }
}
