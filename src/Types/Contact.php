<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a phone contact.
 */
class Contact implements TypeInterface
{
    /**
     * @param string      $phoneNumber Contact's phone number
     * @param string      $firstName   Contact's first name
     * @param string|null $lastName    Optional. Contact's last name
     * @param int|null    $userId      Optional. Contact's user identifier in Telegram. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param string|null $vcard       Optional. Additional data about the contact in the form of a vCard
     */
    public function __construct(
        public string $phoneNumber,
        public string $firstName,
        public ?string $lastName = null,
        public ?int $userId = null,
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
            if (!isset($data[$field])) {
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
            userId: $result['user_id'] ?? null,
            vcard: $result['vcard'] ?? null,
        );
    }
}
